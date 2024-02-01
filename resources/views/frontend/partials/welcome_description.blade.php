<div class="about__one-right">
    <div class="about__one-right-title">
        <span class="subtitle-four">{{ $data['homepage']->subtitle ?? '' }}</span>
        <h2>{{ $data['homepage']->title ?? '' }}</h2>
        <div class="text-align-justify">
            {!! $data['homepage']->description ?? '' !!}
        </div>
    </div>
    @if($data['homepage']->link)
        <div class="about__one-right-bottom">
            <div class="about__one-right-bottom-list">
                <a class="btn-two" href="{{ $data['homepage']->link ?? '' }}">{{ $data['homepage']->button }}</a>
            </div>
        </div>
    @endif
</div>
