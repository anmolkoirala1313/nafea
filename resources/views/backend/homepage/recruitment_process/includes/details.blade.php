<tr>
    <td>
        {!! Form::text('detail_title[]',  isset($detail) ? $detail->title:null, ['class'=>'form-control detail_title','placeholder'=>'Enter title']) !!}
        {!! Form::hidden('detail_id[]',  isset($detail) ? $detail->id:null, ['class'=>'form-control detail_title','readonly']) !!}
    </td>
{{--    <td>--}}
{{--        {!! Form::text('detail_icon[]', isset($detail) ? $detail->icon:null, ['class'=>'form-control detail_icon','placeholder'=>'Enter icon']) !!}--}}
{{--    </td>--}}
    <td>
        {!! Form::textarea('detail_description[]', isset($detail) ? $detail->description:null, ['class'=>'form-control detail_description','placeholder'=>'Enter description']) !!}
    </td>
    <td>
        <button type="button" title="Remove Process"
                class="btn btn-outline-danger waves-effect waves-light remove_row"><i class="ri-delete-bin-6-line"></i></button>
    </td>
</tr>
