<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\LaborRepresentativeRequest;
use App\Models\Backend\LaborRepresentative;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LaborRepresentativeController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.labor_representative.';
    protected string $view_path     = 'backend.labor_representative.';
    protected string $page          = 'Labor Representative';
    protected string $folder_name   = 'labor_representative';
    protected string $page_title, $page_method, $image_path, $file_path, $thumb_height, $thumb_width;
    protected object $model;


    public function __construct()
    {
        $this->model            = new LaborRepresentative();
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

            $this->model->create($request->all());
            Session::flash('success',$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
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

        return response()->json(route($this->base_route.'index'));
    }
}
