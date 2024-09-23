<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Candidate\CandidateInfoRequest;
use App\Models\Backend\AuthorizedAgency;
use App\Models\Backend\Candidate;
use App\Services\CandidateService;
use App\Traits\ControllerOps;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use CountryState;


class CandidateController extends BackendBaseController
{
    use ControllerOps;

    protected string $module      = 'backend.';
    protected string $base_route  = 'backend.candidate.';
    protected string $view_path   = 'backend.candidate.';
    protected string $page        = 'Candidate List';
    protected string $folder_name = 'candidate';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;
    private CandidateService $candidateService;

    public function __construct(CandidateService $candidateService)
    {
        $this->model             = new Candidate();
        $this->candidateService  = $candidateService;
        $this->image_path        = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
        $this->file_path          = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR);
    }

    public function getData(): array
    {
        $data['country'] = CountryState::getCountries();
        $data['authorized_agencies'] = AuthorizedAgency::active()->descending()->pluck('title','id');
        return $data;
    }

    public function getDataForDataTable(Request $request): JsonResponse
    {
        return $this->candidateService->getDataForDatatable($request);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CandidateInfoRequest $request
     * @return JsonResponse
     */
    public function store(CandidateInfoRequest $request)
    {
        $data['case_file_type'] = '';
        DB::beginTransaction();
        try {
            $request->request->add(['initial_password' => $request['password_input']]);
            $request->request->add(['created_by' => auth()->user()->id]);
            $request->request->add(['passport_expiry_date' => Carbon::parse($request['passport_expiry_date'])->format('Y-m-d') ]);

            $middleName = $request['middle_name'] ? $request['middle_name'].' ':'';
            $fullname   = $request['first_name'] .' '. $middleName . $request['last_name'];
            $request->request->add(['fullname' => $fullname ]);

            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'));
                $request->request->add(['photo'=>$image_name]);
            }

            if($request->hasFile('passport_input')){
                $image_name = $this->uploadImage($request->file('passport_input'));
                $request->request->add(['passport_photo'=>$image_name]);
            }

            if($request->hasFile('case_file_input')){
                $file = $request->file('case_file_input');
                if(in_array($file->getClientMimeType(), ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'])) {
                    $image_name = $this->uploadImage($request->file('case_file_input'));
                    $request->request->add(['case_file'=>$image_name]);
                    $data['case_file_type'] = 'image';
                }else{
                    $file_name  = $this->uploadFile( $request->file('case_file_input'));
                    $request->request->add(['case_file' => $file_name]);
                    $data['case_file_type'] = 'file';
                }
            }

            $request->request->add(['case_file_type'=>$data['case_file_type']]);

            $this->model->create($request->all());
            Session::flash('success', $this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', $this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CandidateInfoRequest $request
     * @param int                  $id
     * @return JsonResponse
     */
    public function update(CandidateInfoRequest $request, $id)
    {
        $data['row']           = $this->model->find($id);
        $data['case_file_type'] = $data['row']->case_file_type;

        DB::beginTransaction();
        try {
            if ($request->hasFile('image_input')) {
                $image_name = $this->updateImage($request->file('image_input'), $data['row']->image, '415', '505');
                $request->request->add(['image' => $image_name]);
            }
            $request->request->add(['updated_by' => auth()->user()->id]);
            $request->request->add(['passport_expiry_date' => Carbon::parse($request['passport_expiry_date'])->format('Y-m-d') ]);

            $middleName = $request['middle_name'] ? $request['middle_name'].' ':'';
            $fullname   = $request['first_name'] .' '. $middleName . $request['last_name'];
            $request->request->add(['fullname' => $fullname ]);

            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'));
                $request->request->add(['photo'=>$image_name]);
                if ($data['row']->photo){
                    $this->deleteImage($data['row']->photo);
                }
            }

            if($request->hasFile('passport_input')){
                $image_name = $this->uploadImage($request->file('passport_input'));
                $request->request->add(['passport_photo'=>$image_name]);
                if ($data['row']->passport_photo){
                    $this->deleteImage($data['row']->passport_photo);
                }
            }

            if($request->hasFile('case_file_input')){
                $file = $request->file('case_file_input');
                //removing image or file based on previous data
                if ($data['row']->case_file_type == 'image'){
                    $this->deleteImage($data['row']->case_file);
                }else{
                    $this->deleteFile($data['row']->case_file);
                }
                if(in_array($file->getClientMimeType(), ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'])) {
                    $image_name = $this->uploadImage($request->file('case_file_input'));
                    $request->request->add(['case_file'=>$image_name]);
                    $data['case_file_type'] = 'image';
                }else{
                    $file_name  = $this->uploadFile( $request->file('case_file_input'));
                    $request->request->add(['case_file' => $file_name]);
                    $data['case_file_type'] = 'file';
                }
            }

            $request->request->add(['case_file_type'=>$data['case_file_type']]);

            $data['row']->update($request->all());

            Session::flash('success', $this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Session::flash('error', $this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }
}
