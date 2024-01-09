<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\Homepage\SliderRequest;
use App\Http\Requests\Backend\Homepage\WelcomeRequest;
use App\Models\Backend\Homepage\Slider;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class SliderController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_group    = 'backend.homepage.';
    protected string $base_route    = 'backend.homepage.slider.';
    protected string $view_path     = 'backend.homepage.slider.';
    protected string $page          = 'Slider';
    protected string $folder_name   = 'slider';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new Slider();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SliderRequest $request
     * @return JsonResponse
     */
    public function store(SliderRequest $request)
    {
        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'1920','900');
                $request->request->add(['image'=>$image_name]);
            }
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
     * @param SliderRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(SliderRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image,'1920','900');
                $request->request->add(['image'=>$image_name]);
            }

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
