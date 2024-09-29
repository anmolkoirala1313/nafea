<?php

namespace App\Http\Controllers\Candidate;

use App\Models\Backend\AuthorizedAgency;
use App\Models\Backend\Candidate;
use App\Models\Backend\Setting;
use App\Models\Backend\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DashboardController extends BackendBaseController
{
    protected string $module        = 'candidate.';
    protected string $page          = 'Dashboard';
    protected string $base_route    = 'candidate.';
    protected string $view_path     = 'candidate.';

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
        $data['current_agency'] = auth()->user()->authorizedAgency;
        $data['your_agency']    = Candidate::active()->where('authorized_agency_id', auth()->user()->authorized_agency_id)->count();
        $data['all_agency']     = Candidate::all()->count();

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
