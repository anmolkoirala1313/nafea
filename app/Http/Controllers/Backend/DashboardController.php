<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Career\Job;
use App\Models\Backend\Menu;
use App\Models\Backend\News\Blog;
use App\Models\Backend\News\BlogCategory;
use App\Models\Backend\Page\Page;
use App\Models\Backend\Service;
use App\Models\Backend\Setting;
use App\Models\Backend\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DashboardController extends BackendBaseController
{
    protected string $module        = 'backend.';
    protected string $page         = 'Dashboard';
    protected string $base_route    = 'backend.';
    protected string $view_path     = 'backend.';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $data                   = [];
        $data['all_users']      = User::take(4)->get();
        $data['services']       = Service::take(4)->get();
        $data['feeds']          = Blog::take(4)->get();
        $data['menus']          = Menu::all()->count();
        $data['pages']          = Page::all()->count();
        $data['blog_category']  = BlogCategory::all()->count();
        $data['jobs']           = Job::all()->count();

        return view($this->loadResource($this->view_path.'dashboard'), compact('data'));
    }

    public function filemanager()
    {
        return view($this->view_path.'filemanager.index');
    }

    public function themeMode(Request $request)
    {
        $id                  = $request->input('setting_id');
        $theme               = Setting::find($id);
        $theme               = $theme->update($request->all());
        return response()->json(['status'=>'success','mode'=>$theme->theme_mode]);

    }

    public function errorPage()
    {
        $data               = [];
        return view($this->loadResource($this->view_path.'errors.404'), compact('data'));
    }

}
