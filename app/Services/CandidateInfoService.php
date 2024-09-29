<?php

namespace App\Services;

use App\Models\Backend\Candidate;
use App\Traits\DateFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CandidateInfoService {

    use DateFilter;

    protected string $module      = 'candidate.';
    protected string $base_route  = 'candidate.information_list.';
    protected string $view_path   = 'candidate.information_list.';
    private DataTables $dataTables;
    private Candidate $model;

    public function __construct(DataTables $dataTables)
    {
        $this->model        = new Candidate();
        $this->dataTables = $dataTables;
    }

    public function getDataForDatatable(Request $request){

        $request->session()->forget(['filter_period','from_date','to_date','authorized_agency_id','passport_number']);

        $query = $this->model->query()->orderBy('created_at', 'desc');

        return $this->dataTables->eloquent($query)
            ->filter(function ($query) use($request){
                if ($request['authorized_agency_id']){
                    $query->where('authorized_agency_id',$request['authorized_agency_id']);
                }
                if ($request['passport_number']){
                    $query->where('passport_number',$request['passport_number']);
                }
                $this->FilterTableData($query,'candidates');
            })
            ->editColumn('status',function ($item){
                $status = $item->status;
                return view($this->module.'includes.status_display', compact('status'));
            })
            ->editColumn('agency',function ($item){
                return $item->authorizedAgency->title;
            })
            ->editColumn('action',function ($item){
                $params = [
                    'id'            => $item->id,
                    'base_route'    => $this->base_route,
                    'authorized_agency_id' => $item->authorized_agency_id,
                ];
                return view($this->view_path.'.includes.dataTable_action', compact('params'));

            })
            ->filterColumn('agency', function($query, $keyword) {
                $query->whereHas('authorizedAgency', function($section) use($keyword){
                    $section->where('title', 'like', "%" . $keyword . "%");
                });
            })
            ->rawColumns(['action','status'])
            ->addIndexColumn()
            ->make(true);
    }


}
