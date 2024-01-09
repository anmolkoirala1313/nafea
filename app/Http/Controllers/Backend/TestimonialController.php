<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Homepage\WelcomeRequest;
use App\Http\Requests\Backend\TestimonialRequest;
use App\Models\Backend\Testimonial;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class TestimonialController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.testimonial.';
    protected string $view_path     = 'backend.testimonial.';
    protected string $page         = 'Testimonial';
    protected string $folder_name   = 'testimonial';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new Testimonial();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TestimonialRequest $request
     * @return JsonResponse
     */
    public function store(TestimonialRequest $request)
    {
        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'80','80');
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
     * @param WelcomeRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(TestimonialRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image,'80','80');
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
