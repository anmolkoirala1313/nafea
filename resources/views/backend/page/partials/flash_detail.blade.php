<tr>
    <td>
        {!! Form::text('list_title[]',  isset($detail) ? $detail->list_title:null, ['class'=>'form-control list_title','placeholder'=>'Enter title']) !!}
        {!! Form::hidden('list_id[]',  isset($detail) ? $detail->id:null, ['class'=>'form-control list_id','readonly']) !!}
    </td>
    <td>
        {!! Form::textarea('list_description[]', isset($detail) ? $detail->list_description:null, ['class'=>'form-control list_description','placeholder'=>'Enter description']) !!}
    </td>
    <td>
        {!! Form::file('image_input[]', ['class'=>'form-control','required'=>'required']) !!}
        @if(isset($detail) && $detail->image)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($detail->image))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($detail->image))}}" alt="" />
                            <div class="gallery-overlay">
                                <h5 class="overlay-caption">Image</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </td>
    <td>
        <button type="button" title="Remove Flash Card"
                class="btn btn-outline-danger waves-effect waves-light remove_row"><i class="ri-delete-bin-6-line"></i></button>
    </td>
</tr>
