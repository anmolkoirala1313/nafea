<?php

namespace App\Http\Controllers\Frontend\Career;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Backend\Career\Job;
use App\Models\Backend\Career\JobCategory;
use App\Traits\FrontendSearch;
use Illuminate\Contracts\Support\Renderable;

class JobController extends BackendBaseController
{
    use FrontendSearch;
    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.job.';
    protected string $view_path     = 'frontend.job.';
    protected string $page          = 'Job';
    protected string $folder_name   = 'job';
    protected string $page_title, $page_method, $image_path;
    protected object $model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model                = new Job();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $this->page_method      = 'index';
        $this->page_title       = 'All '.$this->page;
        $data                   = $this->getCommonData();
        $data['rows']           = $this->model->active()->descending()->paginate(4);

        if(!$data['rows']){
            abort(404);
        }
        return view($this->loadResource($this->view_path.'index'), compact('data'));
    }


    public function getCommonData(): array
    {
        $data['categories']     = JobCategory::active()->descending()->has('jobs')->withCount('jobs')->get();
        $data['latest']         = $this->model->active()->descending()->limit(4)->get();

        return $data;
    }

    public function show($slug)
    {

        $this->page_method      = 'show';
        $this->page_title       = $this->page.' Details';
        $data                   = $this->getCommonData();
        $data['row']            = $this->model->where('slug',$slug)->first();

        if(!$data['row']){
            abort(404);
        }

        return view($this->loadResource($this->view_path.'show'), compact('data'));
    }

    public function category($slug)
    {
        try {
            $this->page_method      = 'category';
            $data                   = $this->getCommonData();

            $data['category']       = JobCategory::where('slug',$slug)->active()->first();
            $this->page_title       = $data['category']->title;
            $data['rows']           = $this->model->whereHas('categories', function ($category) use($data){
                return $category->where('job_categories.id', $data['category']->id);
            })->active()->descending()->paginate(4);
        } catch (\Exception $e) {
            abort(404);
        }

        return view($this->loadResource($this->view_path.'category'), compact('data'));
    }

}
