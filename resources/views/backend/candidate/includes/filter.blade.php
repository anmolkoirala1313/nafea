{{--<div class="col-12 col-md-12 col-lg-12 d-flex">--}}
{{--    <div class="card flex-fill">--}}
{{--        <div class="card-body">--}}
{{--            <div class="row filter-row" data-select2-id="10">--}}
{{--                <div class="col-sm-4 col-md-3">--}}
{{--                    <div class="form-group form-focus select-focus focused">--}}
{{--                        {!! Form::select('filter_period', ['today'=>'Today','yesterday'=>'Yesterday','week'=>'Last Week','two_weeks'=>'Last Two Weeks','month'=>'Month'], null,['class'=>'custom-select select-height select2','id'=>'filter_period','placeholder'=>'Select Search Period']) !!}--}}
{{--                        <label class="focus-label">Search Period</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-4 col-md-2">--}}
{{--                    <div class="form-group form-focus focused">--}}
{{--                        <div class="cal-icon">--}}
{{--                            <input class="form-control floating datetimepicker" name="from_date" id="from_date" type="text" />--}}
{{--                        </div>--}}
{{--                        <label class="focus-label">From</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-4 col-md-2">--}}
{{--                    <div class="form-group form-focus focused">--}}
{{--                        <div class="cal-icon">--}}
{{--                            <input class="form-control floating datetimepicker" name="to_date" id="to_date" type="text" />--}}
{{--                        </div>--}}
{{--                        <label class="focus-label">To</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-4 col-md-2">--}}
{{--                    <button type="button" id="filter_data" class="btn add-btn"> Filter </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="card">
    <div class="card-header">
        <div class="row g-3">
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
            <!--end col-->
            <div class="col-xxl-3 col-sm-6">
                <div>
                    <button type="button" class="btn btn-primary w-100" id="filter_data"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                        Filters
                    </button>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
</div>


