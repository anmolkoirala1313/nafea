<div class="col-lg-6">
    <div class="nosticky-side-div">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"> Core {{ $i + 1}} Details</h5>
            </div>
            <div class="card-body">
                <div class="position-relative mb-3">
                    {!! Form::label('detail_title', 'Title', ['class' => 'form-label required']) !!}
                    {!! Form::text('detail_title[]', isset($detail) ? $detail->title:null, ['class'=>'form-control detail_title','placeholder'=>'Enter title']) !!}
                    {!! Form::hidden('detail_id[]', isset($detail) ? $detail->id:null, ['class'=>'form-control detail_id','readonly']) !!}
                </div>
                <div class="position-relative mb-3">
                    {!! Form::label('detail_description', 'Description', ['class' => 'form-label']) !!}
                    {!! Form::textarea('detail_description[]', isset($detail) ? $detail->description:null, ['class'=>'form-control detail_description','placeholder'=>'Enter description']) !!}
                </div>
            </div>

            <!-- end card body -->
        </div>


    </div>
</div>
