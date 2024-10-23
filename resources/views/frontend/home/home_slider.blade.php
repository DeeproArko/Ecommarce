@php
    
    $slider = App\Models\Slider::orderBy('slider_title', 'ASC')->get();
@endphp
<style>
#background_width {
  width:100%;
}
</style>
<section class="home-slider position-relative mb-30">
    <div class="container">
        <div class="home-slide-cover mt-30">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">

                @foreach ($slider as $item)
                    <div class="single-hero-slider single-animation-wrap">
                        <img src="{{ asset($item->slider_image) }}" alt="SRMART_Slider" width="100%" height="100%" style="
    border-radius: 0px !important;>
                    </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </div>
</section>
