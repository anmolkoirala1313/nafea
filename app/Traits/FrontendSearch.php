<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FrontendSearch {

    public function search(Request $request)
    {
        $this->page_method      = 'search';
        $this->page_title       = 'Search '.$this->page;
        $data                   = $this->getCommonData();
        $data['query']          = $request['for'];

        $data['rows']           = $this->model->query();

        if($request['for']){
            $data['rows']->where('title', 'LIKE', '%' . $data['query']  . '%');
        }

        $data['rows']           = $data['rows']->active()->paginate(6);

        return view($this->loadResource($this->view_path.'search'), compact('data'));
    }

}
