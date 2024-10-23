@extends('frontend.master_dashboard')
@section('main')

@section('title')
     Sale 
@endsection
@php
    $products = App\Models\Product::where ('campaign','1')->latest()->get();
    $banner = App\Models\Banner::orderBy('banner_title', 'ASC')->get();
@endphp
<style>
.campaigns {
    width:100% !important;
}
</style>

<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                @foreach ($banner as $item)
           
                <div class="col-lg-12 col-md-12">
                     <a href="#!">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src="{{ asset($item->banner_image) }}" alt=""  width="100%" height="200px"/>
                    </div>
                    </a>
                </div>
            
            @endforeach

            </div>
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="campaigns">
            <div class="shop-product-fillter">
                <div class="totall-product">
                    <p>We found <strong class="text-brand">This Campaigns</strong> items for you!</p>
                </div>
              
            </div>
            <div class="row product-grid">


                @foreach ($products as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                        <img class="default-img" src="{{ asset($product->product_thambnail) }}"
                                            alt="" />

                                    </a>
                                </div>
                                <!--<div class="product-action-1">-->
                                <!--    <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}"-->
                                <!--        onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>-->

                                <!--    <a aria-label="Compare" class="action-btn" id="{{ $product->id }}"-->
                                <!--        onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>-->

                                <!--    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"-->
                                <!--        data-bs-target="#quickViewModal" id="{{ $product->id }}"-->
                                <!--        onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>-->
                                <!--</div>-->

                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount / $product->selling_price) * 100;
                                    
                                @endphp


                                <div class="product-badges product-badges-position product-badges-mrg">

                                    @if ($product->discount_price == null)
                                         <span class="new"><strong>Cupon: BIJOY BLAST 20% Discount</strong></span>
                                    @else
                                        <span class="hot"> {{ round($discount) }} %</span>
                                    @endif


                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                                </div>
                                <h2><a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                        {{ $product->product_name }} </a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    @if ($product->vendor_id == null)
                                        <span class="font-small text-muted">By <a
                                                href="vendor-details-1.html">Owner</a></span>
                                    @else
                                        <span class="font-small text-muted">By <a
                                                href="vendor-details-1.html">{{ $product['vendor']['name'] }}</a></span>
                                    @endif



                                </div>
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



                                    <!--<div class="add-cart">-->
                                    <!--    <a class="add"-->
                                    <!--        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"><i-->
                                    <!--            class="fi-rs-shopping-cart mr-5"></i>Details </a>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                @endforeach

            </div>
            <!--product grid-->
            <div class="pagination-area mt-20 mb-20">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item "><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--End Deals-->


        </div>
        
    </div>
</div>




@endsection
