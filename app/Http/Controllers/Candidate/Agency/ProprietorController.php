<?php

namespace App\Http\Controllers\Candidate\Agency;

use App\Http\Controllers\Candidate\BackendBaseController;
use App\Http\Requests\Backend\ProprietorRequest;
use App\Models\Backend\AuthorizedAgency;
use App\Models\Backend\Proprietor;
use App\Traits\ControllerOps;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ProprietorController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'candidate.';
    protected string $base_route    = 'candidate.authorized_agency.proprietor.';
    protected string $view_path     = 'candidate.authorized_agency.proprietor.';
    protected string $page          = 'Proprietor';
    protected string $folder_name   = 'proprietor';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new Proprietor();
    }

    public function getData(): array
    {
        $data['agencies'] = AuthorizedAgency::active()->descending()->pluck('title','id');

        return $data;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ProprietorRequest $request
     * @return JsonResponse
     */
    public function store(ProprietorRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);

            $proprietor = $this->model->create($request->all());

            Session::flash('success',$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit($id)
    {
        $this->page_method = 'edit';
        $this->page_title  = 'Edit '.$this->page;
        $data              = $this->getData();
        $data['row']       = $this->model->find($id);

        if ($this->checkAuthorizedAgency($data['row']->authorized_agency_id )){
            return redirect()->back();
        }

        return view($this->loadResource($this->view_path.'edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProprietorRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(ProprietorRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['updated_by' => auth()->user()->id ]);

            $data['row']->update($request->all());

            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $data['row'] = $this->model->find($id);
        if ($this->checkAuthorizedAgency($data['row']->authorized_agency_id )){
            return redirect()->back();
        }
        try {
            DB::beginTransaction();
            $this->model->find($id)->forceDelete();
            DB::rollBack();

            //deletable without any child values
            $this->model->find($id)->delete();
            DB::commit();
            Session::flash('success',$this->page.' was removed successfully');
        } catch (\Exception $e) {
            Session::flash('error',$this->page.' was not removed as data is already in use.');
        }

        return response()->json(route($this->base_route.'index'));
    }


    public function removeTrash(Request $request, $id)
    {
        $data['row']       = $this->model->withTrashed()->find($id);

        if ($this->checkAuthorizedAgency($data['row']->authorized_agency_id )){
            return redirect()->back();
        }

        DB::beginTransaction();
        try {
            if ($data['row']->image){
                $this->deleteImage($data['row']->image);
            }
            $data['row']->forceDelete();

            Session::flash('success',$this->page.' was removed successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not removed. Something went wrong.');
        }

        return redirect()->route($this->base_route.'trash');
    }

}
