<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Backend\Album;
use App\Models\Backend\Client;
use App\Models\Backend\Document;
use App\Models\Backend\Homepage\Slider;
use App\Models\Backend\Homepage\Welcome;
use App\Models\Backend\ManagingDirector;
use App\Models\Backend\News\Blog;
use App\Models\Backend\News\Notice;
use App\Models\Backend\News\PressRelease;
use App\Models\Backend\PageHeading;
use App\Models\Backend\PastPresident;
use App\Models\Backend\Service;
use App\Models\Backend\Setting;
use App\Models\Backend\Team;
use App\Models\Backend\Testimonial;
use Illuminate\Contracts\Support\Renderable;
use function Termwind\render;

class HomePageController extends BackendBaseController
{
    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.';
    protected string $view_path     = 'frontend.';
    protected string $page          = '';
    protected string $page_title, $page_method, $image_path;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $data                           = $this->getCommonData();
        $data['sliders']                = Slider::active()->descending()->get();
        $data['testimonials']           = Testimonial::active()->descending()->limit(6)->get();
        $data['services']               = Service::active()->latest()->take(4)->get();
        $data['blogs']                  = Blog::active()->descending()->latest()->take(3)->get();
        $data['press_release']          = PressRelease::active()->descending()->latest()->take(6)->get();
        $data['notices']                = Notice::active()->descending()->latest()->take(4)->get();
        $data['homepage']               = Welcome::first();
        $data['director']               = ManagingDirector::active()->orderBy('order')->get();
        $data['setting']                = Setting::first();
        $data['clients']                = Client::active()->descending()->latest()->take(10)->get();
        $data['testimonial_heading']    = PageHeading::active()->where('type','testimonial')->first();

        return view($this->loadResource($this->view_path.'homepage'), compact('data'));
    }

    public function getCommonData(): array
    {
        return [];
    }

    public function team()
    {
        $this->page_method   = 'index';
        $this->page_title    = 'Our Team';
        $this->page          = 'Team';
        $data                = $this->getCommonData();
        $data['rows']        = Team::active()->orderBy('order')->get();
        $data['heading']     = PageHeading::active()->where('type','team')->first();

        return view($this->loadResource($this->view_path.'page.team'), compact('data'));
    }

    public function pastPresident()
    {
        $this->page_method   = 'index';
        $this->page_title    = 'Our Past Presidents';
        $this->page          = 'Past Presidents';
        $data                = $this->getCommonData();
        $data['rows']        = PastPresident::active()->orderBy('order')->get();
        $data['heading']     = PageHeading::active()->where('type','past_president')->first();

        return view($this->loadResource($this->view_path.'page.past_president'), compact('data'));
    }

    public function testimonial()
    {
        $this->page_method     = 'index';
        $this->page_title      = 'Our Testimonial';
        $this->page            = 'Testimonial';
        $data                  = $this->getCommonData();
        $data['rows']          = Testimonial::active()->descending()->paginate(9);
        $data['heading']       = PageHeading::active()->where('type','testimonial')->first();

        return view($this->loadResource($this->view_path.'page.testimonial'), compact('data'));
    }

    public function album()
    {
        $this->page_method     = 'index';
        $this->page_title      = 'Our Album';
        $this->page            = 'Album';
        $data                  = $this->getCommonData();
        $data['rows']          = Album::active()->descending()->withCount('albumGallery')->having('album_gallery_count', '>', 0)->paginate(6);
        $data['heading']       = PageHeading::active()->where('type','album')->first();

        return view($this->loadResource($this->view_path.'page.album'), compact('data'));
    }

    public function albumGallery($slug)
    {
        $this->page_method     = 'index';
        $this->page            = 'Album';
        $data                  = $this->getCommonData();
        $data['rows']          = Album::where('slug', $slug)->with('albumGallery')->first();
        $this->page_title      = $data['rows']->title;

        return view($this->loadResource($this->view_path.'page.album_gallery'), compact('data'));
    }

    public function document()
    {
        $this->page_method     = 'index';
        $this->page            = 'Document';
        $data                  = $this->getCommonData();
        $data['rows']          = Document::descending()->get();
        $this->page_title      = $data['rows']->first()->title ?? 'Our Document';

        return view($this->loadResource($this->view_path.'page.document'), compact('data'));
    }


    public function brochure()
    {
        $this->page           = 'Company Brochure';
        $data['row']          = Setting::first();

        return view($this->loadResource($this->view_path.'page.brochure'), compact('data'));
    }

}
