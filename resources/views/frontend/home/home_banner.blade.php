@php
    $banner = App\Models\Banner::orderBy('banner_title', 'ASC')
        ->limit(3)
        ->get();
@endphp


<section class="banners mb-25">
    <div class="container">
        <div class="row">

            @foreach ($banner as $item)
           
                <div class="col-lg-12 col-md-12">
                     <a href="https://srmart.xyz/product/Sale">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src="{{ asset($item->banner_image) }}" alt=""  width="100%" height="200px"/>
                    </div>
                    </a>
                </div>
            
            @endforeach


        </div>
    </div>
</section>
