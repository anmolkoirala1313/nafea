<div class="section-title-three__tagline-box">
    <p class="section-title-three__tagline">{{ $data['homepage']->subtitle ?? '' }}</p>
</div>
<h3 class="about-two__title">{{ $data['homepage']->title ?? '' }}</h3>
<div class="about-two__text">{!! $data['homepage']->description ?? '' !!}</div>
@if($data['homepage']->link)
    <div class="about-two__btn-box">
        <a href="{{ $data['homepage']->link ?? '' }}" class="about-one__btn thm-btn">{{ $data['homepage']->button }}</a>
    </div>
@endif
