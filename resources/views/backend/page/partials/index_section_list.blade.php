@if(count($params['page'])>0)
    <ul class="list-group">
    @foreach($params['page'] as $chunk)
        <li class="list-group-item">
            {{ trim(implode(', ', array_map('ucfirst', $chunk)), ', ') }}
        </li>
    @endforeach
    </ul>
@else
    <span> No sections chosen </span>
@endif
