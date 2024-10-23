@extends('frontend.master_dashboard')
@section('main')

@section('title')
    SR MART
@endsection

@include('frontend.home.home_slider')

<!--End hero slider-->
@include('frontend.home.home_features_product')
<!--@include('frontend.home.home_banner')-->
<!--End category slider-->
<!--@include('frontend.home.home_banner')-->
<!--End banners-->


@include('frontend.home.home_new_product')

<!--Products Tabs-->






<!--End Best Sales-->



<!-- Fashion Category -->

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <!--<div class="section-title style-2 wow animate__animated animate__fadeIn">-->
        <!--    <h3>{{ $skip_category_0->category_name }}  </h3>-->

        <!--</div>-->
        <div class="row" style="margin-bottom:5px">
            <div class="col-7 col-sm-7 col-md-6 col-lg-6">
                <div class="section-header section-title style-2 wow animate__animated animate__fadeIn">
                    <h4 class="h2 heading-font custom_font"><b>{{ $skip_category_0->category_name }}</b></h4>
                </div>
            </div>
            <div class="col-5 col-sm-5 col-md-6 col-lg-6 text-right">
                <a href="{{ url('product/category/' . $skip_category_0->id . '/' . $skip_category_0->category_slug) }}" class="btn btn-primary" style="float:right">View All</a>
            </div>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_0 as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                            <img class="default-img" src="{{ asset($product->product_thambnail) }}"
                                                alt="" />

                                        </a>
                                    </div>

                                    @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount / $product->selling_price) * 100;
                                        
                                    @endphp


                                    <div class="product-badges product-badges-position product-badges-mrg">

                                        @if ($product->discount_price == null)
                                            <!--<span class="new"><strong>Cupon: BIJOY BLAST 20% Discount</strong></span>-->
                                        @else
                                            <span class="hot"> {{ round($discount) }} %</span>
                                        @endif


                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                                    </div>
                                    <h2><a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                            {{ $product->product_name }} </a></h2>
                                   
                                    <div class="product-card-bottom">

                                        @if ($product->discount_price == null)
                                            <div class="product-price">
                                                <span>৳ {{ $product->selling_price }}</span>

                                            </div>
                                        @else
                                            <div class="product-price">
                                                <span>৳ {{ $product->discount_price }}</span>
                                                <span class="old-price">${{ $product->selling_price }}</span>
                                            </div>
                                        @endif



                                    </div>
                                      <div>
                                        <span class="font-small">SKU 
                                        <a href="#!">  {{ $product->product_code }}</a>
                                        </span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                    @endforeach





                </div>
                <!--End product-grid-4-->
            </div>


        </div>
        <!--End tab-content-->
    </div>


</section>
<!--End Fashion Category -->

<section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
                data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                <div class="product-list-small animated animated">

                    @foreach ($hot_deals as $item)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"><img
                                        src="{{ asset($item->product_thambnail) }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                        {{ $item->product_name }} </a>
                                </h6>
                                  <div>
                                        <span class="font-small">SKU 
                                        <a href="#!">  {{ $product->product_code }}</a>
                                        </span>
                                </div>
                                @if ($item->discount_price == null)
                                    <div class="product-price">
                                        <span>৳ {{ $item->selling_price }}</span>

                                    </div>
                                @else
                                    <div class="product-price">
                                        <span>৳ {{ $item->discount_price }}</span>
                                        <span class="old-price">৳ {{ $item->selling_price }}</span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach

 <div class="col-5 col-sm-5 col-md-6 col-lg-6 text-center">
                <a href="#!" class="btn btn-primary" style="float:right">View All</a>
            </div>

                </div>
            </div>




            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp"
                data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated"> Special Offer </h4>
                <div class="product-list-small animated animated">


                    @foreach ($special_offer as $item)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"><img
                                        src="{{ asset($item->product_thambnail) }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                        {{ $item->product_name }} </a>
                                </h6>
                                 <div>
                                        <span class="font-small">SKU 
                                        <a href="#!">  {{ $product->product_code }}</a>
                                        </span>
                                </div>
                                @if ($item->discount_price == null)
                                    <div class="product-price">
                                        <span>৳ {{ $item->selling_price }}</span>

                                    </div>
                                @else
                                    <div class="product-price">
                                        <span>৳ {{ $item->discount_price }}</span>
                                        <span class="old-price">৳ {{ $item->selling_price }}</span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach

<div class="col-5 col-sm-5 col-md-6 col-lg-6 text-center">
                <a href="#!" class="btn btn-primary" style="float:right">View All</a>
            </div>

                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
                data-wow-delay=".2s">
                <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                <div class="product-list-small animated animated">


                    @foreach ($new as $item)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"><img
                                        src="{{ asset($item->product_thambnail) }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                        {{ $item->product_name }} </a>
                                </h6>
                                 <div>
                                        <span class="font-small">SKU 
                                        <a href="#!">  {{ $product->product_code }}</a>
                                        </span>
                                </div>
                                @if ($item->discount_price == null)
                                    <div class="product-price">
                                        <span>৳ {{ $item->selling_price }}</span>

                                    </div>
                                @else
                                    <div class="product-price">
                                        <span>৳ {{ $item->discount_price }}</span>
                                        <span class="old-price">৳ {{ $item->selling_price }}</span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
<div class="col-5 col-sm-5 col-md-6 col-lg-6 text-center">
                <a href="#!" class="btn btn-primary" style="float:right">View All</a>
            </div>


                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                data-wow-delay=".3s">
                <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                <div class="product-list-small animated animated">


                    @foreach ($special_deals as $item)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"><img
                                        src="{{ asset($item->product_thambnail) }}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                        {{ $item->product_name }} </a>
                                </h6>
                                <div>
                                        <span class="font-small">SKU 
                                        <a href="#!">  {{ $product->product_code }}</a>
                                        </span>
                                </div>
                                @if ($item->discount_price == null)
                                    <div class="product-price">
                                        <span>${{ $item->selling_price }}</span>

                                    </div>
                                @else
                                    <div class="product-price">
                                        <span>${{ $item->discount_price }}</span>
                                        <span class="old-price">${{ $item->selling_price }}</span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
<div class="col-5 col-sm-5 col-md-6 col-lg-6 text-center">
                <a href="#!" class="btn btn-primary" style="float:right">View All</a>
            </div>



                </div>
            </div>
        </div>
    </div>
</section>



<!-- SweetHome Category -->

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="row" style="margin-bottom:5px">
            <div class="col-7 col-sm-7 col-md-6 col-lg-6">
                <div class="section-header section-title style-2 wow animate__animated animate__fadeIn">
                    <h4 class="h2 heading-font custom_font"><b>{{ $skip_category_2->category_name }}</b></h4>
                </div>
            </div>
            <div class="col-5 col-sm-5 col-md-6 col-lg-6 text-right">
                <a href="{{ url('product/category/' . $skip_category_2->id . '/' . $skip_category_2->category_slug) }}" class="btn btn-primary" style="float:right">View All</a>
            </div>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_2 as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                            <img class="default-img" src="{{ asset($product->product_thambnail) }}"
                                                alt="" />

                                        </a>
                                    </div>
                                
                                    @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount / $product->selling_price) * 100;
                                        
                                    @endphp


                                    <div class="product-badges product-badges-position product-badges-mrg">

                                        @if ($product->discount_price == null)
                                           <!--<span class="new"><strong>Cupon: BIJOY BLAST 20% Discount</strong></span>-->
                                        @else
                                            <span class="hot"> {{ round($discount) }} %</span>
                                        @endif


                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                                    </div>
                                    <h2><a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                            {{ $product->product_name }} </a></h2>
                                    <!--<div class="product-rate-cover">-->
                                    <!--    <div class="product-rate d-inline-block">-->
                                    <!--        <div class="product-rating" style="width: 90%"></div>-->
                                    <!--    </div>-->
                                    <!--    <span class="font-small ml-5 text-muted"> (4.0)</span>-->
                                    <!--</div>-->
                                   
                                    <div class="product-card-bottom">

                                        @if ($product->discount_price == null)
                                            <div class="product-price">
                                                <span>৳ {{ $product->selling_price }}</span>

                                            </div>
                                        @else
                                            <div class="product-price">
                                                <span>৳ {{ $product->discount_price }}</span>
                                                <span class="old-price">${{ $product->selling_price }}</span>
                                            </div>
                                        @endif


                                    </div>
                                      <div>
                                        <span class="font-small">SKU 
                                        <a href="#!">  {{ $product->product_code }}</a>
                                        </span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                    @endforeach





                </div>
                <!--End product-grid-4-->
            </div>


        </div>
        <!--End tab-content-->
    </div>


</section>
<!--End SweetHome Category -->









<!-- Mobile Category -->

<section class="product-tabs section-padding position-relative">
    <div class="container">
       <div class="row" style="margin-bottom:5px">
            <div class="col-7 col-sm-7 col-md-6 col-lg-6">
                <div class="section-header section-title style-2 wow animate__animated animate__fadeIn">
                    <h3 class="h2 heading-font custom_font"><b>{{ $skip_category_7->category_name }}</b></h3>
                </div>
            </div>
            <div class="col-5 col-sm-5 col-md-6 col-lg-6 text-right">
                <a href="{{ url('product/category/' . $skip_category_7->id . '/' . $skip_category_7->category_slug) }}" class="btn btn-primary" style="float:right">View All</a>
            </div>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_7 as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                            <img class="default-img" src="{{ asset($product->product_thambnail) }}"
                                                alt="" />

                                        </a>
                                    </div>
                                   
                                    @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount / $product->selling_price) * 100;
                                        
                                    @endphp


                                    <div class="product-badges product-badges-position product-badges-mrg">

                                        @if ($product->discount_price == null)
                                            <!--<span class="new"><strong>Cupon: BIJOY BLAST 20% Discount</strong></span>-->
                                        @else
                                            <span class="hot"> {{ round($discount) }} %</span>
                                        @endif


                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                                    </div>
                                    <h2><a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                            {{ $product->product_name }} </a></h2>
                               
                                    <div class="product-card-bottom">

                                        @if ($product->discount_price == null)
                                            <div class="product-price">
                                                <span>৳ {{ $product->selling_price }}</span>

                                            </div>
                                        @else
                                            <div class="product-price">
                                                <span>৳ {{ $product->discount_price }}</span>
                                                <span class="old-price">${{ $product->selling_price }}</span>
                                            </div>
                                        @endif
                                    </div>
                                      <div>
                                        <span class="font-small">SKU 
                                        <a href="#!">  {{ $product->product_code }}</a>
                                        </span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                    @endforeach





                </div>
                <!--End product-grid-4-->
            </div>


        </div>
        <!--End tab-content-->
    </div>


</section>
<!--End Mobile Category -->









<!--Vendor List -->



<!--End Vendor List -->

@endsection