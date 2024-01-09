<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Homepage\WelcomeRequest;
use App\Http\Requests\Backend\ManagingDirectorRequest;
use App\Http\Requests\Backend\ServiceRequest;
use App\Http\Requests\Backend\TeamRequest;
use App\Http\Requests\Backend\TestimonialRequest;
use App\Models\Backend\ManagingDirector;
use App\Models\Backend\Service;
use App\Models\Backend\Team;
use App\Models\Backend\Testimonial;
use App\Traits\ControllerOps;
use App\Traits\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class TeamController extends BackendBaseController
{
    use ControllerOps, Order;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.team.';
    protected string $view_path     = 'backend.team.';
    protected string $page          = 'Team';
    protected string $folder_name   = 'team';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new Team();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function index()
    {
        $this->page_method = 'index';
        $this->page_title  = 'List '.$this->page;
        $data              = $this->getData();
        $data['row']       = $this->model->orderBy('order')->get();

        return view($this->loadResource($this->view_path.'index'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeamRequest $request
     * @return JsonResponse
     */
    public function store(TeamRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);

            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'300','300');
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

    /**
     * Update the specified resource in storage.
     *
     * @param TeamRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(TeamRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image,'300','300');
                $request->request->add(['image'=> $image_name]);
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
