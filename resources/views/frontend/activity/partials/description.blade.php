<section class="pt-6 border-bottom">
    <h4 class="fs-22 text-heading my-2">Description</h4>
    <div class="mb-0 lh-214 custom-description">
        {!! $data['row']->description !!}
    </div>
</section>
@if($data['row']->itinerary)
    <section class="pt-6 border-bottom">
        <h4 class="fs-22 text-heading my-2">Itinerary</h4>
        <div class="mb-0 lh-214 custom-description">
            {!! $data['row']->itinerary !!}
        </div>
    </section>
@endif
@if($data['row']->map)
    <section class="py-6 border-bottom">
        <h4 class="fs-22 text-heading mb-6">Location</h4>
        <div class="position-relative">
            <div id="map" class="mapbox-gl map-point-animate mapboxgl-map">
                <iframe loading="lazy" src="{{ $data['row']->map }}" allowfullscreen="" style="height: 400px; width: 830px" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </section>
@endif
@if($data['row']->video)
    <section class="py-6 border-bottom galleries">
        <h4 class="fs-22 text-heading mb-6">Video</h4>
        <div class="item item-size-3-2">
            <div class="card p-0">
                <div class="card-img" style="background-image:url('{{ getYoutubeThumbnail($data['row']->video) }}')">
                </div>
                <div class="card-img-overlay d-flex align-items-center justify-content-center p-4">
                    <a href="{{ $data['row']->video }}" class="d-inline-block position-relative play-animation" data-gtf-mfp="true"
                       data-mfp-options="{&quot;type&quot;:&quot;iframe&quot;}" tabindex="0">
                                            <span class="text-primary bg-white w-78px h-78 rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-play"></i>
                                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif
