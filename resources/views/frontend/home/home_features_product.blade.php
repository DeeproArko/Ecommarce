@php
    $featured = App\Models\Product::where('campaign','1')->latest()->get();
@endphp


<section class="section-padding ">
    <div class="container">
       <div class="row" style="margin-bottom:5px">
             <div class="col-7 col-sm-7 col-md-6 col-lg-6">
                     <!--<p id="timer"></p>-->
                     <h4>BIJOY BLAST SALE</h4>
            </div>
            <div class="col-5 col-sm-5 col-md-6 col-lg-6 text-right">
                <a href="{{ url('product/Sale') }}" class="btn btn-primary" style="float:right">View All</a>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 text-right">
                <!--<a href="{{ url('product/featured/') }}" class="btn btn-primary" style="float:right">View All</a>-->
            </div>
             
        </div>
        <div class="row">
            
            <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">


                                @foreach ($featured as $product)
                                 <div class="col-6 col-sm-6 col-xs-6 col-md-6 col-lg-6">
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                    <img class="default-img"
                                                        src="{{ asset($product->product_thambnail) }}"
                                                        alt="" />

                                                </a>
                                            </div>
                                           

                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount / $product->selling_price) * 100;
                                                
                                            @endphp


                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                @if ($product->discount_price == null)
                                                    <span class="new"><strong>Free Delivery Available</strong></span>
                                                @else
                                                    <span class="hot"> {{ round($discount) }} %</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a
                                                    href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                                            </div>
                                            <h2><a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                            </h2>
                                            @if ($product->discount_price == null)
                                                <div class="product-price mt-10">
                                                    <span>৳ {{ $product->selling_price }} </span>

                                                </div>
                                            @else
                                                <div class="product-price mt-10">
                                                    <span>৳ {{ $product->discount_price }} </span>
                                                    <span class="old-price">${{ $product->selling_price }}</span>
                                                </div>
                                            @endif


                                            </div>
                                     
                                        <!--</div>-->
                                    </div>
                                    </div>
                                    <!--End product Wrap-->
                                @endforeach




                            </div>
                        </div>
                    </div>
                    <!--End tab-pane-->


                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>







