<?php

namespace App\Http\Controllers\Backend\GeneralSetup;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\GeneralSetup\DistrictRequest;
use App\Models\Backend\GeneralSetup\District;
use App\Models\Backend\GeneralSetup\State;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class DistrictController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.general_setup.district.';
    protected string $view_path     = 'backend.general_setup.district.';
    protected string $page          = 'District';
    protected string $folder_name   = 'district';
    protected string $page_title, $page_method, $image_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new District();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function getData(): array
    {
        $data['states'] = State::active()->pluck('title','id');

        return $data;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param DistrictRequest $request
     * @return JsonResponse
     */
    public function store(DistrictRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['key' => $this->model->changeTokey($request['title'])]);
            $request->request->add(['created_by' => auth()->user()->id ]);
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'600','400');
                $request->request->add(['image'=>$image_name]);
            }

            $this->model->create($request->all());
            Session::flash('success',$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }


    public function update(DistrictRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['slug' => $this->model->changeTokey($request['title'])]);
            $request->request->add(['updated_by' => auth()->user()->id ]);

            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image,'600','400');
                $request->request->add(['image'=>$image_name]);
            }

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
