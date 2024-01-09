<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Backend\News\BlogCategory;
use App\Models\Backend\Page\Page;
use App\Models\Backend\Page\PageSectionElement;
use App\Models\Backend\Setting;
use Illuminate\Contracts\Support\Renderable;

class PageController extends BackendBaseController
{
    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.page.';
    protected string $view_path     = 'frontend.page.';
    protected string $page          = 'Page';
    protected string $folder_name   = 'page';
    protected string $page_title, $page_method, $image_path;
    protected object $model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model                = new Page();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index($slug)
    {
        $data                  = [];
        $data['row']           = $this->model->active()->where('slug', $slug)->first();
        if(!$data['row']){
            abort(404);
        }
        $this->page_method          = 'index';
        $this->page_title           = $data['row']->title;
        $data['page_section']       = $data['row']->pageSections->pluck('slug','id')->toArray();
        $data['section_elements']   = [];
        $data['slider_list_type']   = $data['row']->pageSections->where('slug','slider_list')->first()->list_number_2 ?? null;

        foreach ($data['row']->pageSections as $section){
            if($section->slug == 'gallery'){
                $data['section_elements'][$section->slug] = $section;
            }else{
                $data['section_elements'][$section->slug] = $section->pageSectionElements;
            }
        }

        return view($this->loadResource($this->view_path.'index'), compact('data'));
    }

    public function show($slug)
    {

        $this->page_method      = 'show';
        $this->page_title       = $this->page.' Details';
        $data                   = [];
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
            $data['category']       = BlogCategory::where('slug',$slug)->active()->first();
            $this->page_title       = $data['category']->title.' | '.$this->page;
            $data['rows']           = $this->model->where('blog_category_id', $data['category']->id)->active()->descending()->paginate(6);
        } catch (\Exception $e) {
            abort(404);
        }

        return view($this->loadResource($this->view_path.'category'), compact('data'));
    }

    public function sliderListSingle($slug)
    {
        $this->page_method      = 'show';
        $this->page_title       = 'List Details';
        $data['row'] = PageSectionElement::with('section')->where('list_subtitle', $slug)->first();
        if (!$data['row']) {
            return abort(404);
        }

        $data['latest']  = PageSectionElement::with('section')->where('page_section_id', @$data['row']->page_section_id)->get();
        $data['setting'] = Setting::first();

        return view($this->loadResource($this->view_path.'slider_list.show'), compact('data'));
    }

}
