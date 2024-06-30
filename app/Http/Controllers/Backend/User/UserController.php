<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\UserRequest;
use App\Models\Backend\Candidate;
use App\Models\Backend\User;
use App\Services\UserService;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use CountryState;

class UserController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.user.user-management.';
    protected string $view_path     = 'backend.user.user_management.';
    protected string $page          = 'User';
    protected string $folder_name   = 'user';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;
    private UserService $userService;


    public function __construct(UserService $userService)
    {
        $this->model        = new User();
        $this->userService  = $userService;
        $this->image_path   = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
        $this->file_path     = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR);
    }

    public function getData(): array
    {
        $data['country'] = CountryState::getCountries();
        return $data;
    }

    public function getDataForDataTable(Request $request)
    {
        return $this->userService->getDataForDatatable($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['password' => bcrypt($request['password_input']) ]);
            $middleName = $request['middle_name'] ? $request['middle_name'].' ':'';
            $fullname   = $request['first_name'] .' '. $middleName . $request['last_name'];
            $request->request->add(['name' => $fullname ]);

            $request->request->add(['password',]);
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'200','200');
                $request->request->add(['image'=>$image_name]);
            }
            if($request->hasFile('cover_image')){
                $image_name = $this->uploadImage($request->file('cover_image'),'2000','850');
                $request->request->add(['cover'=>$image_name]);
            }

            $user = $this->model->create($request->all());

            if ($request['user_type'] == 'general'){
                $request->request->add(['user_id'=>$user->id]);
                $this->candidateCreateUpdate($request);
            }

            Session::flash('success',$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UserRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->has('password_input')) {
                $request->request->add(['password', bcrypt($request['password_input'])]);
            }
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'200','200');
                $request->request->add(['image'=>$image_name]);
            }
            if($request->hasFile('cover_image')){
                $image_name = $this->uploadImage($request->file('cover_image'),'2000','850');
                $request->request->add(['cover'=>$image_name]);
            }

            $data['row']->update($request->all());
            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }

    public function removeTrash(Request $request, $id)
    {
        $data['row']       = $this->model->withTrashed()->find($id);
        DB::beginTransaction();
        try {
            $this->deleteImage($data['row']->image);
            $this->deleteImage($data['row']->cover);
            $data['row']->forceDelete();

            Session::flash('success',$this->page.' was removed successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not removed. Something went wrong.');
        }

        return redirect()->route($this->base_route.'trash');
    }

    public function statusUpdate(){

        $data['row']       = $this->model->find(request()->id);
        DB::beginTransaction();
        try {
            $data['row']->update(request()->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }
        return response()->json(['id'=>$data['row']->id,'status'=>$data['row']->status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     */
    public function candidateCreateUpdate(UserRequest $request)
    {
        $data['row']       = $this->model->find($request['user_id']);
        $data['case_file_type'] = '';
        DB::beginTransaction();
        try {
            $request->request->add(['initial_password' => $request['password_input']]);
            $request->request->add(['created_by' => auth()->user()->id ]);

            if($request->hasFile('candidate_input')){
                $image_name = $this->uploadImage($request->file('candidate_input'));
                $request->request->add(['photo'=>$image_name]);
            }

            if($request->hasFile('passport_input')){
                $image_name = $this->uploadImage($request->file('passport_input'));
                $request->request->add(['passport_photo'=>$image_name]);
            }

            if($request->hasFile('case_file_input')){
                $file = $request->file('case_file_input');
                if(in_array($file->getClientMimeType(), ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'])) {
                    $image_name = $this->uploadImage($request->file('case_file_input'));
                    $request->request->add(['case_file'=>$image_name]);
                    $data['case_file_type'] = 'image';
                }else{
                    $file_name  = $this->uploadFile( $request->file('case_file_input'));
                    $request->request->add(['case_file' => $file_name]);
                    $data['case_file_type'] = 'file';
                }
            }



            $request->request->add(['case_file_type'=>$data['case_file_type']]);

            Candidate::updateOrCreate(
                [
                    'user_id' => $request['user_id'],
                    'id' => $request['id'],
                ],
                $request->all());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd('here: '.$e);
            Session::flash('error','Candidate info was not created. Something went wrong.');

        }
    }

}
