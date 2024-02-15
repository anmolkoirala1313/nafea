<?php

namespace App\Services\Frontend;


use App\Models\Backend\AuthorizedAgency;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class AuthorizedAgencyService {


    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.authorized_agency.';
    protected string $view_path     = 'frontend.authorized_agency.';
    private DataTables $dataTables;
    private AuthorizedAgency $model;

    public function __construct(DataTables $dataTables)
    {
        $this->model        = new AuthorizedAgency();
        $this->dataTables = $dataTables;
    }

    public function getDataForDatatable(Request $request){

        $query = $this->model->query()->with('proprietors','laborRepresentatives')->orderBy('title', 'asc');

        return $this->dataTables->eloquent($query)
            ->editColumn('action',function ($item){
                return '<button class="btn-two btn-sm view-agency-modal" data-value="'.$item->id.'" type="button">View</button>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

}
