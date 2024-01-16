<?php

namespace App\Http\Controllers\Frontend\Agency;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Backend\AuthorizedAgency;
use App\Models\Backend\News\BlogCategory;
use App\Services\Frontend\AuthorizedAgencyService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class AuthorizedAgencyController extends BackendBaseController
{
    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.authorized_agency.';
    protected string $view_path     = 'frontend.authorized_agency.';
    protected string $page          = 'Authorized Agencies';
    protected string $folder_name   = 'authorized_agencies';
    protected string $page_title, $page_method, $image_path;
    protected object $model;
    private AuthorizedAgencyService $authorizedAgencyService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorizedAgencyService $authorizedAgencyService)
    {
        $this->model                    = new AuthorizedAgency();
        $this->authorizedAgencyService   = $authorizedAgencyService;

    }

    public function dataForAgency(Request $request)
    {
        return $this->authorizedAgencyService->getDataForDatatable($request);
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
        $data['categories']     = BlogCategory::active()->descending()->has('blogs')->withCount('blogs')->get();
        $data['latest']         = $this->model->active()->descending()->limit(4)->get();

        return $data;
    }

}
