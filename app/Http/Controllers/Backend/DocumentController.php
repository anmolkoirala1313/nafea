<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\DocumentRequest;
use App\Models\Backend\Document;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class DocumentController extends BackendBaseController
{
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.document.';
    protected string $view_path     = 'backend.document.';
    protected string $page          = 'Document';
    protected string $folder_name   = 'document';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model           = new Document();
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

            foreach ($request['list_title'] as $index=>$title){
                $document     = $this->model->find($request['list_id'][$index]);

                $title        =  array_key_exists($index, $request->input('title')) ? $request->input('title')[$index] : null;
                $subtitle     =  array_key_exists($index, $request->input('subtitle')) ? $request->input('subtitle')[$index] : null;
                $description  =  array_key_exists($index, $request->input('description')) ? $request->input('description')[$index] : null;

                if ($request->file('file_input') && array_key_exists($index,$request->file('file_input'))){
                    $file_name  = $this->uploadFile( $request->file('file_input')[$index]);
                    $request->request->add(['list_file_'.$index => $file_name]);
                    if ($document && $document->list_file){
                        $this->deleteFile($document->list_file);
                    }
                }

                Document::updateOrCreate(
                    [
                        'id'          => $request['list_id'][$index],
                    ],
                    [
                        'title'            => $title,
                        'subtitle'         => $subtitle,
                        'description'      => $description,
                        'list_title'       => $request['list_title'][$index] ?? null,
                        'list_description' => $request['list_description'][$index] ?? null,
                        'list_file'        => $request['list_file_'.$index] ?? $document->list_file,
                        'created_by'       => $request['created_by'],
                    ]
                );
            }


            //removing the values
            foreach ($db_values as $id){
                if (!in_array($id,$request['list_id'])){
                    $document = Document::find($id);
                    if ($document && $document->list_file){
                        $this->deleteFile($document->list_file);
                    }
                    $document->delete();
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
