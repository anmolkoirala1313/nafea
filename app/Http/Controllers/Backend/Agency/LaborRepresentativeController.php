<?php

namespace App\Http\Controllers\Backend\Agency;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\LaborRepresentativeRequest;
use App\Models\Backend\AuthorizedAgency;
use App\Models\Backend\LaborRepresentative;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LaborRepresentativeController extends BackendBaseController
{
    use ControllerOps;

    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.authorized_agency.labor_representative.';
    protected string $view_path     = 'backend.authorized_agency.labor_representative.';
    protected string $page          = 'Labor Representative';
    protected string $folder_name   = 'labor_representative';
    protected string $page_title, $page_method, $image_path, $file_path, $thumb_height, $thumb_width;
    protected object $model;


    public function __construct()
    {
        $this->model            = new LaborRepresentative();
    }


    public function getData(): array
    {
        $data['agencies'] = AuthorizedAgency::active()->descending()->pluck('title','id');

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LaborRepresentativeRequest $request
     * @return JsonResponse
     */
    public function store(LaborRepresentativeRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);

            $data = $this->model->create($request->all());

            Session::flash('success',$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->module.'authorized_agency.show', $data->authorized_agency_id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param LaborRepresentativeRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(LaborRepresentativeRequest $request, $id)
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

        return response()->json(route($this->module.'authorized_agency.show', $data['row']->authorized_agency_id));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $agency_id = '';
        try {
            DB::beginTransaction();
            $this->model->find($id)->forceDelete();
            DB::rollBack();

            //deletable without any child values
            $model     = $this->model->find($id);
            $agency_id = $model->authorized_agency_id;

            $model->delete();
            DB::commit();
            Session::flash('success',$this->page.' was removed successfully');
        } catch (\Exception $e) {
            Session::flash('error',$this->page.' was not removed as data is already in use.');
        }

        return response()->json(route($this->module.'authorized_agency.show', $agency_id));
    }


    public function trash($agency_id)
    {
        $this->page_method  = 'trash';
        $this->page_title   = 'Trash '.$this->page;
        $data               = [];
        $data['users']      = $this->model->onlyTrashed()->get();
        $data['agency_id']  = $agency_id;

        return view($this->loadResource($this->view_path.'trash'), compact('data'));
    }


    public function restore(Request $request, $id)
    {
        $agency_id = '';
        DB::beginTransaction();
        try {
            $restored  = $this->model->withTrashed()->find($id)->restore();

            $agency_id = $this->model->find($id)->authorized_agency_id;
            Session::flash('success',$this->page.' restored successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Session::flash('error',$this->page.' restored failed. Something went wrong.');
        }

        return redirect()->route($this->module.'authorized_agency.show', $agency_id);
    }


    public function removeTrash(Request $request, $id)
    {
        $data['row']       = $this->model->withTrashed()->find($id);

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

        return redirect()->route($this->base_route.'trash', $data['row']->authorized_agency_id);
    }

}
