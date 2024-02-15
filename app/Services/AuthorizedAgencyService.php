<?php

namespace App\Services;

use App\Models\Backend\AuthorizedAgency;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class AuthorizedAgencyService {


    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.authorized_agency.';
    protected string $view_path     = 'backend.authorized_agency.';
    private DataTables $dataTables;
    private AuthorizedAgency $model;

    public function __construct(DataTables $dataTables)
    {
        $this->model        = new AuthorizedAgency();
        $this->dataTables = $dataTables;
    }

    public function getDataForDatatable(Request $request){

        $query = $this->model->query()->orderBy('title');

        return $this->dataTables->eloquent($query)
            ->editColumn('status',function ($item){
                $status = $item->status;
                return view($this->module.'includes.status_display', compact('status'));
            })
            ->editColumn('action',function ($item){
                $params = [
                    'id'            => $item->id,
                    'key'           => $item->key,
                    'base_route'    => $this->base_route,
                ];
                return view($this->view_path.'.includes.dataTable_action', compact('params'));

            })
            ->rawColumns(['action','status'])
            ->addIndexColumn()
            ->make(true);
    }

}
