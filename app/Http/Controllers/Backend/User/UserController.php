<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\UserRequest;
use App\Models\Backend\AuthorizedAgency;
use App\Models\Backend\User;
use App\Services\UserService;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $data['authorized_agencies'] = AuthorizedAgency::active()->descending()->pluck('title','id');
        return $data;
    }

    public function getDataForDataTable(Request $request)
    {
        return $this->userService->getDataForDatatable($request);
    }

    public function getDataForCandidateDataTable(Request $request)
    {
        return $this->userService->getDataForGeneralDataTable($request);
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
            if($request->has('user_type') && $request['user_type'] == 'general') {
                $request->request->add(['is_candidate' => 1 ]);
            }
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'200','200');
                $request->request->add(['image'=>$image_name]);
            }
            if($request->hasFile('cover_image')){
                $image_name = $this->uploadImage($request->file('cover_image'),'2000','850');
                $request->request->add(['cover'=>$image_name]);
            }

            $user = $this->model->create($request->all());

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

            if($request->has('password_input') && $request['password_input']) {
                $request->request->add(['password' => bcrypt($request['password_input']) ]);
            }

            if($request->has('user_type') && $request['user_type'] == 'general') {
                $request->request->add(['is_candidate' => 1 ]);
            }else{
                $request->request->add(['is_candidate' => 0 ]);
            }

            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'200','200');
                $request->request->add(['image'=>$image_name]);
            }
            if($request->hasFile('cover_image')){
                $image_name = $this->uploadImage($request->file('cover_image'),'2000','850');
                $request->request->add(['cover'=>$image_name]);
            }
            $middleName = $request['middle_name'] ? $request['middle_name'].' ':'';
            $fullname   = $request['first_name'] .' '. $middleName . $request['last_name'];
            $request->request->add(['name' => $fullname ]);

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

}
