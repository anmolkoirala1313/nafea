<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\Homepage\WhyUsRequest;
use App\Models\Backend\Homepage\WhyUs;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class WhyUsController extends BackendBaseController
{
    protected string $module        = 'backend.';
    protected string $base_group    = 'backend.homepage.';
    protected string $base_route    = 'backend.homepage.why_us.';
    protected string $view_path     = 'backend.homepage.why_us.';
    protected string $page          = 'Homepage Why Us';
    protected string $folder_name   = 'why_us';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new WhyUs();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function create()
    {
        $this->page_method = 'index';
        $this->page_title  = 'Create '.$this->page;
        $data              = [];
        $data['row']       = $this->model->first();

        return view($this->loadResource($this->view_path.'create'), compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param WhyUsRequest $request
     * @return JsonResponse
     */
    public function store(WhyUsRequest $request)
    {
        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'470','550');
                $request->request->add(['why_image'=>$image_name]);
            }
            $request->request->add(['created_by' => auth()->user()->id ]);

            $this->model->create($request->all());
            Session::flash('success',$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'create'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WhyUsRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(WhyUsRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->why_image,'470','550');
                $request->request->add(['why_image'=>$image_name]);
            }

            $request->request->add(['updated_by' => auth()->user()->id ]);
            $data['row']->update($request->all());

            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'create'));
    }

}
