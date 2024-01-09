<?php

namespace App\Http\Controllers\Backend\Career\Basic_setup;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\Career\JobCategoryRequest;
use App\Models\Backend\Career\JobCategory;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class JobCategoryController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.career.basic_setup.category.';
    protected string $view_path     = 'backend.career.basic_setup.category.';
    protected string $page          = 'Job category';
    protected string $folder_name   = 'category';
    protected string $page_title, $page_method, $image_path;
    protected object $model;


    public function __construct()
    {
        $this->model        = new JobCategory();
        $this->image_path   = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->folder_name);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param JobCategoryRequest $request
     * @return JsonResponse
     */
    public function store(JobCategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['slug' => $this->model->changeTokey( $request['title'] )]);
            $request->request->add(['created_by' => auth()->user()->id ]);

            $this->model->create($request->all());
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
     * @param JobCategoryRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(JobCategoryRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['slug' => $this->model->changeTokey($request['title'])]);
            $request->request->add(['updated_by' => auth()->user()->id ]);
            $data['row']->update($request->all());

            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }
}
