<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\News\BlogRequest;
use App\Http\Requests\Backend\News\PressReleaseRequest;
use App\Models\Backend\News\Notice;
use App\Models\Backend\News\PressRelease;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PressReleaseController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.news.press_release.';
    protected string $view_path     = 'backend.news.press_release.';
    protected string $page          = 'Press Release';
    protected string $folder_name   = 'press_release';
    protected string $page_title, $page_method, $image_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new PressRelease();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PressReleaseRequest $request
     * @return JsonResponse
     */
    public function store(PressReleaseRequest $request)
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


    public function update(PressReleaseRequest $request, $id)
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
