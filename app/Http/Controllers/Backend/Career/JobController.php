<?php

namespace App\Http\Controllers\Backend\Career;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\Career\JobRequest;
use App\Models\Backend\Career\Job;
use App\Models\Backend\Career\JobCategory;
use App\Traits\ControllerOps;
use App\Traits\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JobController extends BackendBaseController
{
    use ControllerOps, Status;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.career.job.';
    protected string $view_path     = 'backend.career.job.';
    protected string $page          = 'Job';
    protected string $folder_name   = 'job';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;

    public function __construct()
    {
        $this->model            = new Job();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function getData(): array
    {
        $data['categories']        = JobCategory::active()->pluck('title','id');
        $data['min_qualification'] = ['none'=>'None','primary education'=>'Primary Education','secondary education'=>'Secondary Education','SEE'=>'SEE','intermediate pass'=>'Intermediate Pass','bachelor pass'=>'Bachelor Pass','post graduate pass'=>'Post Graduate Pass'];

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobRequest $request
     * @return JsonResponse
     */
    public function store(JobRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'));
                $request->request->add(['image'=>$image_name]);
            }

            $job = $this->model->create($request->all());

            if($request->has('job_category_id')){
                $job->categories()->sync($request->input('job_category_id'));
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
     * @param JobRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(JobRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['updated_by' => auth()->user()->id ]);
            $request->request->add(['slug' => $this->model->changeTokey($request['title'])]);

            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image);
                $request->request->add(['image'=>$image_name]);
            }

            $data['row']->update($request->all());

            $data['row']->categories()->sync($request->input('job_category_id'));

            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $data = $this->model->find($id);

            $data->categories()->detach();

            //deletable without any child values
            $this->model->find($id)->delete();
            DB::commit();
            Session::flash('success',$this->page.' was removed successfully');
        } catch (\Exception $e) {
            dd($e);
            Session::flash('error',$this->page.' was not removed as data is already in use.');
        }

        return response()->json(route($this->base_route.'index'));
    }

}
