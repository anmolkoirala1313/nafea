<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class BackendBaseController extends Controller
{
    use ImageUpload;

    protected function loadResource($path){
        View::composer($path, function ($view){
            $view->with('base_route', $this->base_route);
            $view->with('view_path', $this->view_path);
            if(isset($this->page)) {
                $view->with('page', $this->page);
            }
            $view->with('folder_name', property_exists($this,'folder_name') ? $this->folder_name:'');
            if(isset($this->module)){
                $view->with('module', $this->module);
            }

            if(isset($this->base_group)){
                $view->with('base_group', $this->base_group);
            }
            if(isset($this->page_method)){
                $view->with('page_method', $this->page_method);
            }

            if(isset($this->page_title)){
                $view->with('page_title', $this->page_title);
            }

            if(isset($this->image_path)){
                $view->with('image_path', $this->image_path);
            }

            if(isset($this->file_path)){
                $view->with('file_path', $this->file_path);
            }

            if(isset($this->folder_name)){
                $view->with('folder_name', $this->folder_name);
            }
        });
        return $path;
    }

    protected function checkAuthorizedAgency($authorized_agency_id){
        $return_boolean = false;
        if ($authorized_agency_id != auth()->user()->authorized_agency_id){
            Session::flash('error','Cannot edit information related to other agency.');
            $return_boolean = true;
        }
        return $return_boolean;
    }


}
