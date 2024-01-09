<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\DocumentRequest;
use App\Models\Backend\VideoGallery;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class VideoGalleryController extends BackendBaseController
{
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.video_gallery.';
    protected string $view_path     = 'backend.video_gallery.';
    protected string $page          = 'Video Gallery';
    protected string $folder_name   = 'video_gallery';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model           = new VideoGallery();
        $this->file_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR);
    }


    public function create()
    {
        $this->page_method = 'index';
        $this->page_title  = 'Create '.$this->page;
        $data              = [];
        $data['rows']      = $this->model->get();

        return view($this->loadResource($this->view_path.'create'), compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param DocumentRequest $request
     * @return JsonResponse
     */
    public function store(DocumentRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);

            $db_values = $this->model->pluck('id');

            foreach ($request['url'] as $index=>$url){
                $this->model->updateOrCreate(
                    [
                        'id'          => $request['id'][$index],
                    ],
                    [
                        'title'         => $request['title'][$index] ?? null,
                        'url'           => $url,
                        'type'          => 'yt',
                        'created_by'    => $request['created_by'],
                    ]
                );
            }


            //removing the values
            foreach ($db_values as $id){
                if (!in_array($id,$request['id'])){
                    $this->model->find($id)->delete();
                }
            }

            Session::flash('success',$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'create'));
    }
}
