<?php

namespace App\Http\Controllers\Frontend\News;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Backend\News\Notice;
use App\Traits\FrontendSearch;
use Illuminate\Contracts\Support\Renderable;

class NoticeController extends BackendBaseController
{
    use FrontendSearch;
    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.notice.';
    protected string $view_path     = 'frontend.notice.';
    protected string $page          = 'Our Notice';
    protected string $folder_name   = 'notice';
    protected string $page_title, $page_method, $image_path;
    protected object $model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model                = new Notice();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $this->page_method      = 'index';
        $this->page_title       = $this->page;
        $data                   = $this->getCommonData();
        $data['rows']           = $this->model->active()->descending()->paginate(9);

        if(!$data['rows']){
            abort(404);
        }

        return view($this->loadResource($this->view_path.'index'), compact('data'));
    }


    public function getCommonData(): array
    {
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


}
