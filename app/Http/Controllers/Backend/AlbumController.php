<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\AlbumRequest;
use App\Models\Backend\Album;
use App\Models\Backend\AlbumGallery;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class AlbumController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.album.';
    protected string $view_path     = 'backend.album.';
    protected string $page          = 'Album';
    protected string $folder_name   = 'album';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new Album();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AlbumRequest $request
     * @return JsonResponse
     */
    public function store(AlbumRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);

            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'412','450');
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
     * @param AlbumRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(AlbumRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image,'412','450');
                $request->request->add(['image'=>$image_name]);
            }
            $request->request->add(['slug' => $this->model->changeTokey($request['title'])]);
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


    public function gallery($id)
    {
        $this->page_method = 'gallery';
        $this->page_title  = 'Album Gallery list '.$this->page;
        $data              = [];
        $data['row']       = $this->model->find($id);

        return view($this->loadResource($this->view_path.'gallery'), compact('data'));
    }


    public function getGallery(Request $request,$id)
    {
        $images = AlbumGallery::where('album_id',$id)->get()->toArray();
        $tableImages = [];
        if (count($images) > 0){
            foreach($images as $image){
                $tableImages[] = $image['resized_name'];
            }
            $storeFolder = public_path('storage/images/'.$this->folder_name.'/gallery/');
            $file_path = public_path('storage/images/'.$this->folder_name.'/gallery/');
            $files = scandir($storeFolder);
            foreach ( $files as $file ) {
                if ($file !='.' && $file !='..' && in_array($file,$tableImages)) {
                    $obj['name'] = $file;
                    $file_path = public_path('storage/images/'.$this->folder_name.'/gallery/').$file;
                    $obj['size'] = filesize($file_path);
                    $obj['path'] = url('/storage/images/'.$this->folder_name.'/gallery/'.$file);
                    $data[] = $obj;
                }
            }
//            dd($files,$tableImages);
            return response()->json($data);
        }
    }

    public function uploadGallery(Request $request,$id)
    {
        $row                 =  $this->model->find($id);
        if($row==null || $row=="null"){
            return redirect()->route($this->base_route.'gallery',$row->id);
        }

        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }


        if (!is_dir($this->image_path . '/'.$this->folder_name.'/gallery/')) {
            mkdir($this->image_path . '/'.$this->folder_name.'/gallery/', 0777);
        }


        for ($i = 0; $i < count($photos); $i++) {
            $photo          = $photos[$i];
            $name           = $this->folder_name."_gallery_".date('YmdHis') . uniqid();
            $save_name      = $name . '.' . $photo->getClientOriginalExtension();
            $resize_name    = "Thumb_".$name . '.' . $photo->getClientOriginalExtension();

            $image_save = Image::make($photo)
                ->orientate()
                ->save($this->image_path . '/'.$this->folder_name.'/gallery/' . $resize_name);



            $photo->move($this->image_path, $save_name);

            $upload                 = new AlbumGallery();
            $upload->album_id       = $row->id;
            $upload->created_by     = Auth::user()->id;
            $upload->filename       = $save_name;
            $upload->resized_name   = $resize_name;
            $upload->original_name  = basename(pathinfo($photo->getClientOriginalName(),PATHINFO_FILENAME));
            $upload->save();
        }

        return response()->json(['success'=> $save_name]);
    }

    public function deleteGallery(Request $request)
    {
        $resized_name   = $request->get('filename');
        $uploaded_image = AlbumGallery::where('resized_name', $resized_name)->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->image_path . '/'.$this->folder_name.'/gallery/' . $uploaded_image->filename;
        $resized_file = $this->image_path . '/'.$this->folder_name.'/gallery/' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            @unlink($file_path);
        }

        if (file_exists($resized_file)) {
            @unlink($resized_file);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['success' => $resized_name], 200);
    }
}
