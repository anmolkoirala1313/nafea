<div class="card">
    <div class="card-header">
        <div class="row g-2">
            <div class="col-xxl-3 col-sm-6">
                <div>
                    {!! Form::select('filter_period', ['today'=>'Today','yesterday'=>'Yesterday','week'=>'Last Week','two_weeks'=>'Last Two Weeks','month'=>'Month'], null,['class'=>'custom-select select-height select2','id'=>'filter_period','placeholder'=>'Select Search Period']) !!}
                    <label class="focus-label mt-2">Search Period</label>
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-3 col-sm-6">
                <div>
                    <input type="text" class="form-control from_date" data-provider="flatpickr" id="demo-datepicker" placeholder="Select From date">
                    <label class="focus-label">From Date</label>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div>
                    <input type="text" class="form-control to_date" data-provider="flatpickr" id="demo-datepicker" placeholder="Select To date">
                    <label class="focus-label">To Date</label>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div>
                    {!! Form::select('authorized_agency_id', $data['authorized_agencies'], null,['class'=>'form-select mb-3 select2','id'=>'agency_id','placeholder'=>'Select Authorized Agency']) !!}
                    <label class="focus-label mt-2">Agency</label>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
                <div>
                    <input type="text" class="form-control" id="passport_num" placeholder="Enter passport number" autocomplete="on">
                    <label class="focus-label">Passport Number</label>
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-1 col-sm-6">
                <div>
                    <button type="button" class="btn btn-primary w-100" id="filter_data"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                        Filter
                    </button>
                </div>
            </div>
            <div class="col-xxl-1 col-sm-6">
                <div>
                    <button type="button" class="btn btn-soft-danger w-100" id="reset_data"> <i class="ri-refresh-line me-1 align-bottom"></i>
                        Clear
                    </button>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
</div>


