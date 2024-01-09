<?php

namespace App\Http\Controllers\Frontend\Service;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Backend\Service;
use App\Models\Backend\Setting;
use App\Traits\FrontendSearch;
use Illuminate\Contracts\Support\Renderable;

class ServiceController extends BackendBaseController
{
    use FrontendSearch;
    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.service.';
    protected string $view_path     = 'frontend.service.';
    protected string $page          = 'Categories We Recruit';
    protected string $folder_name   = 'service';
    protected string $page_title, $page_method, $image_path;
    protected object $model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model                = new Service();
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
        $data['rows']           = $this->model->active()->descending()->paginate(9);

        if(!$data['rows']){
            abort(404);
        }
        return view($this->loadResource($this->view_path.'index'), compact('data'));
    }


    public function getCommonData(): array
    {
        $data['latest']         = $this->model->active()->descending()->limit(8)->get();
        $data['setting']        = Setting::first();
        return $data;
    }


    public function show($slug)
    {
        $this->page_method      = 'show';
        $data                   = $this->getCommonData();
        $data['row']            = $this->model->where('key',$slug)->first();
        $this->page_title       = $data['row']->title;

        if(!$data['row']){
            abort(404);
        }

        return view($this->loadResource($this->view_path.'show'), compact('data'));
    }
}
