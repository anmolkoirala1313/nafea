<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\News\BlogCategoryRequest;
use App\Models\Backend\News\BlogCategory;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class BlogCategoryController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.news.basic_setup.category.';
    protected string $view_path     = 'backend.news.basic_setup.category.';
    protected string $page         = 'Blog Category';
    protected string $folder_name   = 'category';
    protected string $page_title, $page_method, $image_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new BlogCategory();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param BlogCategoryRequest $request
     * @return JsonResponse
     */
    public function store(BlogCategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['key' => $this->model->changeTokey($request['title'])]);
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


    public function update(BlogCategoryRequest $request, $id)
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
