<tr>
    <td>
        {!! Form::text('list_title[]',  isset($detail) ? $detail->list_title:null, ['class'=>'form-control list_title','placeholder'=>'Enter title']) !!}
        {!! Form::hidden('list_id[]',  isset($detail) ? $detail->id:null, ['class'=>'form-control list_id','readonly']) !!}
    </td>
    <td>
        {!! Form::textarea('list_description[]', isset($detail) ? $detail->list_description:null, ['class'=>'form-control list_description','placeholder'=>'Enter description']) !!}
    </td><td>
        {!! Form::file('file_input[]', ['class'=>'form-control list_file','accept' => '.pdf, .doc, .docx, .xls, .xlsx, .html']) !!}
        @if(isset($detail) && $detail->image)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <a href="{{ asset(filePath($detail->image))}}" class="fw-medium link-primary" download>Download File</a>
            </div>
        @endif
    </td>
    <td>
        <button type="button" title="Remove Process"
                class="btn btn-outline-danger waves-effect waves-light remove_document"><i class="ri-delete-bin-6-line"></i></button>
    </td>
</tr>
