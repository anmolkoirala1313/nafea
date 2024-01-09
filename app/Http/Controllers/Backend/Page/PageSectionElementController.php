<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\PageSectionElementRequest;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Backend\Page\Page;
use App\Models\Backend\Page\PageSection;
use App\Models\Backend\Page\PageSectionElement;
use App\Models\Backend\Page\PageSectionGallery;
use App\Services\PageSectionElementsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class PageSectionElementController extends BackendBaseController
{
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.page.';
    protected string $view_path     = 'backend.page.';
    protected string $page          = 'Page section elements';
    protected string $folder_name   = 'section_element';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;

    public function __construct()
    {
        $this->model           = new PageSectionElement();
        $this->image_path      = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
        $this->file_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR);
    }

    public function show($id)
    {
        $this->page_method          = 'show';
        $this->page_title           = 'Update '.$this->page;
        $data                       = [];
        $data['row']                = Page::find($id);
        $data['page_section']       = $data['row']->pageSections->pluck('slug','id')->toArray();
        $data['section_elements']   = [];

        foreach ($data['row']->pageSections as $section){
            $data['section_elements'][$section->slug] = $section->pageSectionElements;
        }
        return view($this->loadResource($this->view_path.'show'), compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(PageSectionElementRequest $request, PageSectionElementsService $pageSectionElementsService)
    {
        $data                 = [];
        $data['section_name'] = $request['section_name'];
        $data['section']      = ucfirst(str_replace('_',' ',$data['section_name']));
        $data['section_id']   = $request['page_section_id'];

        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);
            $request->request->add(['status' => true ]);

            $pageSectionElementsService->syncSectionElements($request, $data);

            Session::flash('success',$data['section'].' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Session::flash('error',$data['section'].' was not created. Something went wrong.');
        }

        return response()->json(route($this->module.'section-element.show',$request['page_id']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageSectionElementRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data['row']        = $this->model->find($id);
        $data['section']    = ucfirst(str_replace('_',' ',$request['section_name']));
        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image,'550','550');
                $request->request->add(['image'=>$image_name]);
            }
            $request->request->add(['status' => true ]);
            $request->request->add(['updated_by' => auth()->user()->id ]);

            $data['row']->update($request->all());

            Session::flash('success',$data['section'].' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Session::flash('error',$data['section'].' was not updated. Something went wrong.');
        }

        return response()->json(route($this->module.'section-element.show',$request['page_id']));
    }

    public function multipleSectionUpdate(Request $request, PageSectionElementsService $pageSectionElementsService){

        $data['section_name'] = $request['section_name'];
        $data['section']      = ucfirst(str_replace('_',' ',$data['section_name']));
        $data['section_id']   = $request['page_section_id'];

        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);
            $request->request->add(['updated_by' => auth()->user()->id ]);
            $request->request->add(['status' => true ]);

            $pageSectionElementsService->updateMultipleSectionElements($request, $data);

            Session::flash('success',$data['section'].' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Session::flash('error',$data['section'].' was not updated. Something went wrong.');
        }

        return response()->json(route($this->module.'section-element.show',$request['page_id']));
    }

    public function getGallery(Request $request,$id)
    {
        $images = PageSectionGallery::where('page_section_id',$id)->get()->toArray();
        $tableImages = [];
        if (count($images) > 0){
            foreach($images as $image){
                $tableImages[] = $image['resized_name'];
            }
            $storeFolder = public_path('storage/images/section_element/gallery/');
            $file_path = public_path('storage/images/section_element/gallery/');
            $files = scandir($storeFolder);
            foreach ( $files as $file ) {
                if ($file !='.' && $file !='..' && in_array($file,$tableImages)) {
                    $obj['name'] = $file;
                    $file_path = public_path('storage/images/section_element/gallery/').$file;
                    $obj['size'] = filesize($file_path);
                    $obj['path'] = url('/storage/images/section_element/gallery/'.$file);
                    $data[] = $obj;
                }
            }
//            dd($files,$tableImages);
            return response()->json($data);
        }
    }


    public function uploadGallery(Request $request,$id)
    {
        $page_section                 =  PageSection::with('page')->find($id);
        if($page_section==null || $page_section=="null"){
            return Response::json([
                'message' => 'Page Section Not Found'
            ], 400);
        }

        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }


        if (!is_dir($this->image_path . '/section_element/gallery/')) {
            mkdir($this->image_path . '/section_element/gallery/', 0777);
        }


        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = $page_section->page->slug."_page_gallery_".date('YmdHis') . uniqid();
            $save_name = $name . '.' . $photo->getClientOriginalExtension();

            $resize_name = "Thumb_".$name . '.' . $photo->getClientOriginalExtension();

            $image_save = Image::make($photo)
                ->orientate()
                // ->resize(500, 500)
                ->save($this->image_path . '/section_element/gallery/' . $resize_name);



            $photo->move($this->image_path. '/section_element/gallery/', $save_name);

            $upload = new PageSectionGallery();
            $upload->page_section_id    = $page_section->id;
            $upload->upload_by          = Auth::user()->id;
            $upload->filename           = $save_name;
            $upload->resized_name       = $resize_name;
            $upload->original_name      = basename(pathinfo($photo->getClientOriginalName(),PATHINFO_FILENAME));
            $upload->save();
        }

        return response()->json(['success'=>$save_name]);
    }

    public function deleteGallery(Request $request)
    {
        $resized_name = $request->get('filename');
        $uploaded_image = PageSectionGallery::where('resized_name', $resized_name)->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->image_path . '/section_element/gallery/' . $uploaded_image->filename;
        $resized_file = $this->image_path . '/section_element/gallery/' . $uploaded_image->resized_name;

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
