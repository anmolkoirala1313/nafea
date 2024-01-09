<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\Homepage\CallActionRequest;
use App\Models\Backend\Homepage\CallAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CallActionController extends BackendBaseController
{
    protected string $module        = 'backend.';
    protected string $base_group    = 'backend.homepage.';
    protected string $base_route    = 'backend.homepage.call_action.';
    protected string $view_path     = 'backend.homepage.call_action.';
    protected string $page          = 'Homepage Call Action';
    protected string $folder_name   = 'call_action';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new CallAction();
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
     * @param CallActionRequest $request
     * @return JsonResponse
     */
    public function store(CallActionRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);
            $request->request->add(['status' =>true ]);

            $this->model->updateOrCreate(
                ['id' => $request['id']],
                $request->all());

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
     * @param CallActionRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CallActionRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['updated_by' => auth()->user()->id ]);
            $request->request->add(['status' =>true ]);

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
