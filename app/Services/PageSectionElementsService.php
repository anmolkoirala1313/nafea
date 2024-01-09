<?php

namespace App\Services;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Backend\Page\PageSection;
use App\Models\Backend\Page\PageSectionElement;
use App\Traits\ImageUpload;
use Yajra\DataTables\DataTables;


class PageSectionElementsService {

    use ImageUpload;
    protected object $model;
    protected string $image_path, $file_path;

    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.page.';
    protected string $folder_name   = 'section_element';

    public function __construct()
    {
        $this->model            = new PageSectionElement();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
        $this->file_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR);
    }

    public function syncSectionElements($request,$data)
    {
        if($data['section_name'] == 'faq') {
            $faq_num   = $request['list_number_1'];
            for ($i=0;$i<$faq_num;$i++){
//                    $subheading  =  array_key_exists($i, $request->input('subtitle')) ? $request->input('subtitle')[$i] : null;
                $heading     =  array_key_exists($i, $request->input('title')) ? $request->input('title')[$i] : null;

                $this->model->create([
                    'page_section_id'     => $data['section_id'],
                    'title'               => $heading,
                    'list_title'          => $request['list_title'][$i],
                    'list_description'    => $request['list_description'][$i],
                    'status'              => $request['status'],
                    'created_by'          => $request['created_by'],
                ]);
            }
        }
        elseif ($data['section_name'] == 'flash_card'){
            $flash_cards       = PageSection::find($data['section_id']);
            $flash_cards_id    = $flash_cards->pageSectionElements->pluck('id')->toArray();
            foreach ($request['list_title'] as $index=>$title){
                $section     = $this->model->find($request['list_id'][$index]);
                $heading     =  array_key_exists($index, $request->input('title')) ? $request->input('title')[$index] : null;
                $subheading  =  array_key_exists($index, $request->input('subtitle')) ? $request->input('subtitle')[$index] : null;

                if ($request->file('image_input') && array_key_exists($index,$request->file('image_input'))){
                    $image_name  = $this->updateImage( $request->file('image_input')[$index],null,'45','45');
                    $request->request->add(['image_'.$index => $image_name]);
                    if ($section && $section->image){
                        $this->deleteImage($section->image);
                    }
                }

                $this->model->updateOrCreate(
                    [
                        'id'              => $request['list_id'][$index],
                        'page_section_id' => $data['section_id']
                    ],
                    [
                        'title'               => $heading,
                        'subtitle'            => $subheading,
                        'list_title'          => $title,
                        'image'               => $request['image_'.$index] ?? $section->image,
                        'list_description'    => $request['list_description'][$index],
                        'status'              => $request['status'],
                        'created_by'          => $request['created_by'],
                        'updated_by'          => $request['updated_by']
                    ]
                );

            }

            foreach ($flash_cards_id as $value){
                if(!in_array($value,$request->input('id'))){
                    $element = $this->model->find($value);
                    $this->deleteImage($element->image);
                    $element->forceDelete();
                }
            }
        }
        elseif ($data['section_name'] == 'slider_list'){
            $slider_list_num  = $request['list_number_1'];
            for ($i=0; $i < $slider_list_num; $i++){
                $heading     =  array_key_exists($i, $request->input('title')) ? $request->input('title')[$i] : null;
                $subheading  =  array_key_exists($i, $request->input('subtitle')) ? $request->input('subtitle')[$i] : null;

                if (array_key_exists($i,$request->file('image_input'))){
                    $image_name  = $this->uploadImage( $request->file('image_input')[$i], '776','464');
                    $request->request->add(['image' => $image_name]);
                }
                $this->model->create([
                    'page_section_id'     => $data['section_id'],
                    'title'               => $heading,
                    'subtitle'            => $subheading,
                    'image'               => $request['image'] ?? null,
                    'list_title'          => $request['list_title'][$i],
                    'list_subtitle'       => $this->model->changeTokey($request['list_title'][$i]),
                    'list_description'    => $request['list_description'][$i],
                    'status'              => $request['status'],
                    'created_by'          => $request['created_by'],
                ]);
            }
        }
        elseif ($data['section_name'] == 'document'){
            $this->storeDocument($request, $data);
        }
        else{
            if ($request->hasFile('image_input')) {
                $image_name = $this->uploadImage($request->file('image_input'), '550','450');
                $request->request->add(['image' => $image_name]);
            }
            $this->model->create($request->all());
        }
    }

    public function updateMultipleSectionElements($request,$data){

        if($data['section_name'] == 'faq') {
            $faq_num                    = $request['list_number_1'];
            $faq_section                = PageSection::find($data['section_id']);
            $faq_section_elements_id    = $faq_section->pageSectionElements->pluck('id')->toArray();
            for ($i=0;$i<$faq_num;$i++){
                $heading     =  array_key_exists($i, $request->input('title')) ? $request->input('title')[$i] : null;
//                    $subheading  =  array_key_exists($i, $request->input('subtitle')) ? $request->input('subtitle')[$i] : null;

                $this->model->updateOrCreate(
                    [   'id'              => $request['id'][$i],
                        'page_section_id' => $data['section_id']
                    ], [
                    'title'               => $heading,
                    'list_title'          => $request['list_title'][$i],
                    'list_description'    => $request['list_description'][$i],
                    'status'              => $request['status'],
                    'created_by'          => $request['created_by'],
                    'updated_by'          => $request['updated_by']
                ]);

            }

            foreach ($faq_section_elements_id as $value){
                if(!in_array($value,$request->input('id'))){
                    $this->model->find($value)->forceDelete();
                }
            }
        }
        elseif ($data['section_name'] == 'slider_list'){
            $slider_list_num   = $request['list_number_1'];
            $slider_list       = PageSection::find($data['section_id']);
            $slider_list_id    = $slider_list->pageSectionElements->pluck('id')->toArray();
            for ($i=0; $i < $slider_list_num; $i++){
                $section     = $this->model->find($request['id'][$i]);
                $heading     =  array_key_exists($i, $request->input('title')) ? $request->input('title')[$i] : null;
                $subheading  =  array_key_exists($i, $request->input('subtitle')) ? $request->input('subtitle')[$i] : null;

                if ($request->file('image_input') && array_key_exists($i,$request->file('image_input'))){
                    $image_name  = $this->updateImage( $request->file('image_input')[$i],'776','464');
                    $request->request->add(['image_'.$i => $image_name]);
                    if ($section && $section->image){
                        $this->deleteImage($section->image);
                    }
                }

                $this->model->updateOrCreate(
                    [   'id'              => $request['id'][$i],
                        'page_section_id' => $data['section_id']
                    ], [
                    'title'               => $heading,
                    'subtitle'            => $subheading,
                    'image'               => $request['image_'.$i] ?? $section->image,
                    'list_title'          => $request['list_title'][$i],
                    'list_subtitle'       => $this->model->changeTokey($request['list_title'][$i]),
                    'list_description'    => $request['list_description'][$i],
                    'status'              => $request['status'],
                    'created_by'          => $request['created_by'],
                    'updated_by'          => $request['updated_by']
                ]);
            }

            foreach ($slider_list_id as $value){
                if(!in_array($value,$request->input('id'))){
                    $element = $this->model->find($value);
                    $this->deleteImage($element->image);
                    $element->forceDelete();
                }
            }
        }
        else if($data['section_name'] == 'flash_card'){
            $flash_cards       = PageSection::find($data['section_id']);
            $flash_cards_id    = $flash_cards->pageSectionElements->pluck('id')->toArray();
            foreach ($request['list_title'] as $index=>$title){
                $section     = $this->model->find($request['list_id'][$index]);
                $heading     =  array_key_exists($index, $request->input('title')) ? $request->input('title')[$index] : null;
                $subheading  =  array_key_exists($index, $request->input('subtitle')) ? $request->input('subtitle')[$index] : null;

                if ($request->file('image_input') && array_key_exists($index,$request->file('image_input'))){
                    $image_name  = $this->updateImage( $request->file('image_input')[$index],null,'45','45');
                    $request->request->add(['image_'.$index => $image_name]);
                    if ($section && $section->image){
                        $this->deleteImage($section->image);
                    }
                }

                $this->model->updateOrCreate(
                    [
                        'id'              => $request['list_id'][$index],
                        'page_section_id' => $data['section_id']
                    ],
                    [
                        'title'               => $heading,
                        'subtitle'            => $subheading,
                        'list_title'          => $title,
                        'image'               => $request['image_'.$index] ?? $section->image,
                        'list_description'    => $request['list_description'][$index],
                        'status'              => $request['status'],
                        'created_by'          => $request['created_by'],
                        'updated_by'          => $request['updated_by']
                    ]
                );

            }

            foreach ($flash_cards_id as $value){
                if(!in_array($value,$request->input('list_id'))){
                    $element = $this->model->find($value);
                    $this->deleteImage($element->image);
                    $element->forceDelete();
                }
            }

        }
        elseif ($data['section_name'] == 'document'){
            $this->storeDocument($request, $data);
        }
    }

    private function storeDocument($request, $data){

        $document       = PageSection::find($data['section_id']);
        $document_id    = $document->pageSectionElements->pluck('id')->toArray();

        foreach ($request['list_title'] as $index=>$title){
            $section      = $this->model->find($request['list_id'][$index]);
            $heading      =  array_key_exists($index, $request->input('title')) ? $request->input('title')[$index] : null;
            $subheading   =  array_key_exists($index, $request->input('subtitle')) ? $request->input('subtitle')[$index] : null;
            $description  =  array_key_exists($index, $request->input('description')) ? $request->input('description')[$index] : null;

            if ($request->file('image_input') && array_key_exists($index,$request->file('image_input'))){
                $image_name  = $this->updateImage( $request->file('image_input')[$index],null,'45','45');
                $request->request->add(['image_'.$index => $image_name]);
                if ($section && $section->image){
                    $this->deleteImage($section->image);
                }
            }

            if ($request->file('file_input') && array_key_exists($index,$request->file('file_input'))){
                $file_name  = $this->uploadFile( $request->file('file_input')[$index]);
                $request->request->add(['image_'.$index => $file_name]);
                if ($section && $section->image){
                    $this->deleteFile($section->image);
                }
            }

            $this->model->updateOrCreate(
                [
                    'id'              => $request['list_id'][$index],
                    'page_section_id' => $data['section_id']
                ],
                [
                    'title'               => $heading,
                    'subtitle'            => $subheading,
                    'description'         => $description,
                    'list_title'          => $title,
                    'image'               => $request['image_'.$index] ?? $section->image,
                    'list_description'    => $request['list_description'][$index],
                    'status'              => $request['status'],
                    'created_by'          => $request['created_by'],
                    'updated_by'          => $request['updated_by']
                ]
            );

        }

        foreach ($document_id as $value){
            if(!in_array($value,$request->input('list_id'))){
                $element = $this->model->find($value);
                $this->deleteFile($element->image);
                $element->forceDelete();
            }
        }

    }
}
