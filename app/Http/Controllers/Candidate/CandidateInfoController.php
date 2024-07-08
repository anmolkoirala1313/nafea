<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Requests\Candidate\CandidateInfoRequest;
use App\Models\Backend\Candidate;
use App\Models\Backend\User;
use App\Traits\ControllerOps;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use CountryState;


class CandidateInfoController extends BackendBaseController
{
    use ControllerOps;

    protected string $module      = 'candidate.';
    protected string $base_route  = 'candidate.user.';
    protected string $view_path   = 'candidate.user.';
    protected string $page        = 'Candidate Info';
    protected string $folder_name = 'user';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model        = new Candidate();
        $this->image_path   = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
        $this->file_path     = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CandidateInfoRequest $request
     * @return JsonResponse
     */
    public function store(CandidateInfoRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['initial_password' => $request['password_input']]);
            $request->request->add(['created_by' => auth()->user()->id]);
            $request->request->add(['passport_expiry_date' => Carbon::parse($request['passport_expiry_date'])->format('Y-m-d') ]);

            $middleName = $request['middle_name'] ? $request['middle_name'].' ':'';
            $fullname   = $request['first_name'] .' '. $middleName . $request['last_name'];
            $request->request->add(['name' => $fullname ]);

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

            $this->model->create($request->all());
            Session::flash('success', $this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', $this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'edit', auth()->user()->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit($id)
    {
        $this->page_method = 'edit';
        $this->page_title  = 'Edit '.$this->page;
        $data              = $this->getData();

        if ($id != auth()->user()->id){
            Session::flash('success', 'Candidate Info mis-matched, cannot access other candidate information');
            return redirect()->route($this->base_route.'edit', auth()->user()->id);
        }

        $data['row']       = $this->model->where('user_id',$id)->first();
        $data['country']   = CountryState::getCountries();

        return view($this->loadResource($this->view_path.'edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CandidateInfoRequest $request
     * @param int                  $id
     * @return JsonResponse
     */
    public function update(CandidateInfoRequest $request, $id)
    {
        $data['row']           = $this->model->find($id);
        $data['case_file_type'] = $data['row']->case_file_type;

        DB::beginTransaction();
        try {
            if ($request->hasFile('image_input')) {
                $image_name = $this->updateImage($request->file('image_input'), $data['row']->image, '415', '505');
                $request->request->add(['image' => $image_name]);
            }
            $request->request->add(['updated_by' => auth()->user()->id]);
            $request->request->add(['passport_expiry_date' => Carbon::parse($request['passport_expiry_date'])->format('Y-m-d') ]);

            $middleName = $request['middle_name'] ? $request['middle_name'].' ':'';
            $fullname   = $request['first_name'] .' '. $middleName . $request['last_name'];
            $request->request->add(['name' => $fullname ]);

            if($request->hasFile('candidate_input')){
                $image_name = $this->uploadImage($request->file('candidate_input'));
                $request->request->add(['photo'=>$image_name]);
                if ($data['row']->photo){
                    $this->deleteImage($data['row']->photo);
                }
            }

            if($request->hasFile('passport_input')){
                $image_name = $this->uploadImage($request->file('passport_input'));
                $request->request->add(['passport_photo'=>$image_name]);
                if ($data['row']->passport_photo){
                    $this->deleteImage($data['row']->passport_photo);
                }
            }

            if($request->hasFile('case_file_input')){
                $file = $request->file('case_file_input');
                //removing image or file based on previous data
                if ($data['row']->case_file_type == 'image'){
                    $this->deleteImage($data['row']->case_file);
                }else{
                    $this->deleteFile($data['row']->case_file);
                }
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

            $data['row']->update($request->all());

            //updating general information for user
            $this->userUpdate($request);

            Session::flash('success', $this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', $this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'edit', auth()->user()->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CandidateInfoRequest $request
     */
    public function userUpdate(CandidateInfoRequest $request){
        $data['row']  = User::find(auth()->user()->id);

        DB::beginTransaction();
        try {

            $data['row']->update(request()->all());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error','User info was not updated. Something went wrong.');
        }
    }
}
