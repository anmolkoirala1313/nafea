<div class="row">
    <div class="hstack gap-2">
        <a href="{{ route($params['base_route'].'gallery',$row->id) }}" title="Add Gallery Images"
           class="btn btn-outline-primary waves-effect waves-light"><i class="ri-image-2-fill"></i></a>
        <a href="{{ route($base_route.'edit',$row->id) }}" title="Edit"
           class="btn btn-outline-success waves-effect waves-light"><i class="ri-pencil-fill"></i></a>
        <button class="btn btn-outline-danger waves-effect waves-light cs-remove-data" title="Remove"
                cs-delete-route="{{ route($base_route.'destroy',$row->id) }}" data-value="{{$row->id}}">
            <i class="ri-delete-bin-6-line"></i></button>
    </div>
</div>
