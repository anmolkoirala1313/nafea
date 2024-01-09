<?php

namespace App\Http\Controllers\Frontend\Activity;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Backend\Activity\PackageCategory;
use App\Models\Backend\Activity\PackageRibbon;
use App\Models\Backend\Activity\Package;
use App\Services\Frontend\JobSearchService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class PackageController extends BackendBaseController
{
    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.activity.';
    protected string $view_path     = 'frontend.activity.';
    protected string $panel         = 'Activity';
    protected string $folder_name   = 'activity';
    protected string $page_title, $page_method, $image_path;
    protected object $model;
    private JobSearchService $packageSearchService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JobSearchService $packageSearchService)
    {
        $this->model                = new Package();
        $this->image_path           = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'package');
        $this->packageSearchService = $packageSearchService;
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
        $data['rows']           = $this->model->active()->descending()->paginate(6);
        if(!$data['rows']){
            abort(404);
        }
        return view($this->loadResource($this->view_path.'index'), compact('data'));
    }


    public function getCommonData(): array
    {
        $data['categories']     = PackageCategory::active()->descending()->has('packages')->withCount('packages')->get();
        $data['ribbons']        = PackageRibbon::active()->descending()->whereHas('packages', function ($package){
            return $package->descending()->take(3);
        })->withCount('packages')->limit(3)->get();

        $data['search_countries']   = $this->getCountries();
        $data['search_categories']  = $this->getPackageCategory();

        return $data;
    }


    public function search(Request $request)
    {
        $this->page_method      = 'search';
        $this->page_title       = 'Search '.$this->page;
        $data                   = $this->getCommonData();
        $data['rows']           = $this->packageSearchService->getSearchedPackages($request);

        return view($this->loadResource($this->view_path.'search'), compact('data'));
    }

    public function show($slug)
    {
        $this->page_method          = 'show';
        $this->page_title           = $this->page.' Details';
        $data                       = $this->getCommonData();
        $data['row']                = $this->model->where('slug',$slug)->first();
        $data['related_activity']   = $this->model->active()->descending()->whereNotIn('id',[$data['row']->id])->where('package_category_id',$data['row']->package_category_id)->limit(6)->get();

        if(!$data['row']){
            abort(404);
        }
        return view($this->loadResource($this->view_path.'show'), compact('data'));
    }

    public function category($slug)
    {
        try {
            $data                   = $this->getCommonData();
            $data['category']       = PackageCategory::where('slug',$slug)->active()->first();
            $this->page_method      = 'category';
            $this->page_title       = $data['category']->title.' | '.$this->page;
            $data['rows']           = $this->model->where('package_category_id', $data['category']->id)->active()->descending()->paginate(6);
        } catch (\Exception $e) {
            abort(404);
        }
        return view($this->loadResource($this->view_path.'category'), compact('data'));
    }

}
