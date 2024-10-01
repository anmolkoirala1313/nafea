<?php

namespace App\Http\Controllers\Candidate\Agency;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\AuthorizedAgencyRequest;
use App\Models\Backend\AuthorizedAgency;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AuthorizedAgencyController extends BackendBaseController
{
    protected string $module      = 'candidate.';
    protected string $base_route  = 'candidate.authorized_agency.';
    protected string $view_path   = 'candidate.authorized_agency.';
    protected string $page        = 'Authorized Agency';
    protected string $folder_name = 'authorized_agency';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;

    public function __construct()
    {
        $this->model                   = new AuthorizedAgency();
        $this->image_path              = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function index()
    {
        $this->page_method = 'index';
        $this->page_title  = 'Edit '.$this->page;
        $data['row']       = $this->model->where('id',  auth()->user()->authorized_agency_id)->first();

        return view($this->loadResource($this->view_path.'edit'), compact('data'));
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
