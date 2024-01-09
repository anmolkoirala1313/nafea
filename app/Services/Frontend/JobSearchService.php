<?php

namespace App\Services\Frontend;

use App\Models\Backend\Career\Job;
use Illuminate\Http\Request;


class JobSearchService {


    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.activity.package.';
    private Job $model;

    public function __construct()
    {
        $this->model        = new Job();
    }

    public function getSearchedJobs(Request $request){

        $data['all_packages']   = $this->model->query();
        if($request['title']){
            $data['all_packages']->where('title', 'LIKE', '%' . $request['title'] . '%');
        }
        session()->forget(['title']);

        return $data['all_jobs']->active()->descending()->get();
    }

}
