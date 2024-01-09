<tr>
    <td>
        {!! Form::text('title[]',  isset($detail) ? $detail->title:null, ['class'=>'form-control list_title','placeholder'=>'Enter title']) !!}
        {!! Form::hidden('id[]',  isset($detail) ? $detail->id:null, ['class'=>'form-control list_id','readonly']) !!}
    </td>
    <td>
        {!! Form::text('url[]', isset($detail) ? $detail->url:null,['class'=>'form-control url','placeholder'=>'Url format: https://www.youtube.com/watch?v=vzdZCm7cAqA']) !!}
{{--        @if(isset($detail) && $detail->url)--}}
{{--            <div class="col-xxl-4 col-xl-4 col-sm-6">--}}
{{--                <!-- Ratio Video 4:3 -->--}}
{{--                <div class="ratio ratio-4x3">--}}
{{--                    <iframe src="{{ $detail->url  }}" title="YouTube video" allowfullscreen></iframe>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
    </td>
    <td>
        <button type="button" title="Remove Video"
                class="btn btn-outline-danger waves-effect waves-light remove_row"><i class="ri-delete-bin-6-line"></i></button>
    </td>
</tr>
