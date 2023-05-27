<section id="section-banner" class="section-banner">

    <div class="banner-slider">
        @foreach($banners as $banner)
            @if(count($banner->files) !== 0)
                <div class="slide-item">
                    <img class="banner-image" src="{{asset($banner->files[0]->url)}}" alt="banner-images">
                </div>
            @endif
        @endforeach
    </div>

</section>
