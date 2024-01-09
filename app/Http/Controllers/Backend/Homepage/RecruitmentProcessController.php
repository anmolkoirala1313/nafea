<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\Homepage\HomeValueRequest;
use App\Http\Requests\Backend\Homepage\RecruitmentProcessRequest;
use App\Models\Backend\Homepage\HomePageRecruitment;
use App\Models\Backend\Homepage\HomePageValue;
use App\Models\Backend\Homepage\Welcome;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class RecruitmentProcessController extends BackendBaseController
{
    protected string $module        = 'backend.';
    protected string $base_group    = 'backend.homepage.';
    protected string $base_route    = 'backend.homepage.recruitment_process.';
    protected string $view_path     = 'backend.homepage.recruitment_process.';
    protected string $page          = 'Homepage Recruitment Process';
    protected string $folder_name   = 'recruitment_process';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model  = new Welcome();
    }


    public function create()
    {
        $this->page_method = 'index';
        $this->page_title  = 'Create '.$this->page;
        $data              = [];
        $data['row']       = $this->model->first();

        return view($this->loadResource($this->view_path.'create'), compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param RecruitmentProcessRequest $request
     * @return JsonResponse
     */
    public function store(RecruitmentProcessRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);
            $request->request->add(['status' => true ]);

            $homepage = $this->model->updateOrCreate(
                ['id' => $request['id']],
                $request->all());

            foreach ($request['detail_title'] as $index=>$title){

                HomePageRecruitment::updateOrCreate(
                    [
                        'id'          => $request['detail_id'][$index],
                        'homepage_id' => $homepage->id
                    ],
                    [
                        'title'         => $title,
                        'description'   => $request['detail_description'][$index] ?? null,
                        'created_by'    => $request['created_by'],
                    ]
                );

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

    /**
     * Update the specified resource in storage.
     *
     * @param RecruitmentProcessRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(RecruitmentProcessRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['updated_by' => auth()->user()->id ]);
            $request->request->add(['status' => true ]);

            $data['row']->update($request->all());

            $db_values = $data['row']->recruitmentProcess->pluck('id');

            foreach ($request['detail_title'] as $index=>$title){
                //adding or updating the values
                HomePageRecruitment::updateOrCreate(
                    [
                        'homepage_id' => $data['row']->id,
                        'id'          => $request['detail_id'][$index]],
                    [
                        'title'         => $title,
                        'description'   => $request['detail_description'][$index] ?? null,
                        'created_by'    => auth()->user()->id,
                        'updated_by'    => $request['updated_by'],
                    ]
                );
            }

            //removing the values
            foreach ($db_values as $id){
                if (!in_array($id,$request['detail_id'])){
                    HomePageRecruitment::find($id)->delete();
                }
            }

            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'create'));
    }
}
