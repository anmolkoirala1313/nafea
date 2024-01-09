<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\SettingRequest;
use App\Models\Backend\Setting;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class SettingController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.setting.';
    protected string $view_path     = 'backend.setting.';
    protected string $page         = 'Setting';
    protected string $folder_name   = 'setting';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new Setting();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
        $this->file_path        = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR);
    }

    public function index()
    {
        $this->page_method = 'index';
        $this->page_title  = 'System '.$this->page;
        $data              = $this->getData();
        $data['row']       = $this->model->descending()->first();

        return view($this->loadResource($this->view_path.'index'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SettingRequest $request
     * @return JsonResponse
     */
    public function store(SettingRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);
            $request->request->add(['status' => true ]);

            if ($request->file('brochure_input')){
                $file_name  = $this->uploadFile( $request->file('brochure_input'));
                $request->request->add(['brochure' => $file_name]);
            }

            if($request->hasFile('logo_input')){
                $image_name = $this->uploadImage($request->file('logo_input'));
                $request->request->add(['logo'=>$image_name]);
            }
            if($request->hasFile('white_logo_input')){
                $image_name = $this->uploadImage($request->file('white_logo_input'));
                $request->request->add(['logo_white'=>$image_name]);
            }
            if($request->hasFile('favicon_input')){
                $image_name = $this->uploadImage($request->file('favicon_input'));
                $request->request->add(['favicon'=>$image_name]);
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

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(SettingRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->hasFile('logo_input')){
                $image_name = $this->updateImage($request->file('logo_input'),$data['row']->logo);
                $request->request->add(['logo'=>$image_name]);
            }
            if($request->hasFile('white_logo_input')){
                $image_name = $this->updateImage($request->file('white_logo_input'),$data['row']->logo_white);
                $request->request->add(['logo_white'=>$image_name]);
            }
            if($request->hasFile('favicon_input')){
                $image_name = $this->updateImage($request->file('favicon_input'),$data['row']->favicon);
                $request->request->add(['favicon'=>$image_name]);
            }

            if ($request->file('brochure_input')){
                $file_name  = $this->uploadFile( $request->file('brochure_input'));
                $request->request->add(['brochure' => $file_name]);
                if ($data['row'] &&  $data['row']->brochure){
                    $this->deleteFile($data['row']->brochure);
                }
            }

            $request->request->add(['updated_by' => auth()->user()->id ]);
            $request->request->add(['status' => true ]);

            $data['row']->update($request->all());

            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }

    public function removeBrochure(){
        $data['row'] = $this->model->first();

        DB::beginTransaction();
        try {

            $data['row']->update(['brochure' => null]);

            if ($data['row'] &&  $data['row']->brochure){
                $this->deleteFile($data['row']->brochure);
            }

            Session::flash('success',$this->page.' was removed successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.'  was not removed. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));

    }
}
