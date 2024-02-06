<?php

namespace App\Http\Controllers\Backend\Agency;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\AuthorizedAgencyRequest;
use App\Models\Backend\AuthorizedAgency;
use App\Services\AuthorizedAgencyService;
use App\Traits\ControllerOps;
use App\Traits\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class AuthorizedAgencyController extends BackendBaseController
{
    use ControllerOps, Order;

    protected string                $module      = 'backend.';
    protected string                $base_route  = 'backend.authorized_agency.';
    protected string                $view_path   = 'backend.authorized_agency.';
    protected string                $page        = 'Authorized Agency';
    protected string                $folder_name = 'authorized_agency';
    protected string                $page_title, $page_method, $image_path, $file_path, $thumb_height, $thumb_width;
    protected object                $model;
    private AuthorizedAgencyService $authorizedAgencyService;


    public function __construct(AuthorizedAgencyService $authorizedAgencyService)
    {
        $this->model                   = new AuthorizedAgency();
        $this->authorizedAgencyService = $authorizedAgencyService;
        $this->image_path              = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function index()
    {
        $this->page_method = 'index';
        $this->page_title  = 'List '.$this->page;
        $data              = $this->getData();

//        $data['row']       = $this->model->orderBy('order')->get();

        return view($this->loadResource($this->view_path.'index'), compact('data'));
    }

    public function getDataForDataTable(Request $request)
    {
        return $this->authorizedAgencyService->getDataForDatatable($request);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorizedAgencyRequest $request
     * @return JsonResponse
     */
    public function store(AuthorizedAgencyRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id]);

            if ($request->hasFile('image_input')) {
                $image_name = $this->uploadImage($request->file('image_input'));
                $request->request->add(['image' => $image_name]);
            }

            $this->model->create($request->all());
            Session::flash('success', $this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Session::flash('error', $this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */

    public function show($id)
    {
        $this->page_method            = 'show';
        $this->page_title             = 'Show '.$this->page;
        $data                         = $this->getData();
        $data['row']                  = $this->model->with(['proprietors', 'laborRepresentatives'])->find($id);
        $data['agencies']             = $this->model->pluck('title', 'id');
        $data['proprietors']          = $data['row']->proprietors;
        $data['laborRepresentatives'] = $data['row']->laborRepresentatives;

        return view($this->loadResource($this->view_path.'show'), compact('data'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param AuthorizedAgencyRequest $request
     * @param int                     $id
     * @return JsonResponse
     */
    public function update(AuthorizedAgencyRequest $request, $id)
    {
        $data['row'] = $this->model->find($id);

        DB::beginTransaction();
        try {
            if ($request->hasFile('image_input')) {
                $image_name = $this->updateImage($request->file('image_input'), $data['row']->image);
                $request->request->add(['image' => $image_name]);
            }

            $request->request->add(['updated_by' => auth()->user()->id]);
            $data['row']->update($request->all());

            Session::flash('success', $this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', $this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }
}
