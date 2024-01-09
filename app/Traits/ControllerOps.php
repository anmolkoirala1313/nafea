<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait ControllerOps {

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */

    public function index()
    {
        $this->page_method = 'index';
        $this->page_title  = 'List '.$this->page;
        $data              = $this->getData();
        $data['row']       = $this->model->descending()->get();

        return view($this->loadResource($this->view_path.'index'), compact('data'));
    }

    public function getData(): array
    {
        return [];
    }

    public function create()
    {
        $this->page_method = 'create';
        $this->page_title  = 'Create '.$this->page;
        $data              = $this->getData();

        return view($this->loadResource($this->view_path.'create'), compact('data'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */

    public function show($id)
    {
        $this->page_method = 'show';
        $this->page_title  = 'Show '.$this->page;
        $data              = $this->getData();
        $data['row']       = $this->model->find($id);

        return view($this->loadResource($this->view_path.'show'), compact('data'));
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

        return view($this->loadResource($this->view_path.'edit'), compact('data'));
    }



    public function update(Request $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image);
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



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
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



    public function trash()
    {
        $this->page_method = 'trash';
        $this->page_title  = 'Trash '.$this->page;
        $data              = [];
        $data['users']     = $this->model->onlyTrashed()->get();

        return view($this->loadResource($this->view_path.'trash'), compact('data'));
    }

    public function restore(Request $request, $id)
    {

        DB::beginTransaction();
        try {
            $this->model->withTrashed()->find($id)->restore();

            Session::flash('success',$this->page.' restored successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' restored failed. Something went wrong.');
        }

        return redirect()->route($this->base_route.'index');
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

        return redirect()->route($this->base_route.'trash');
    }


}
