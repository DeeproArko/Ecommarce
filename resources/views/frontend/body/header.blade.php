@php
    $setting = App\Models\SiteSetting::find(1);
@endphp


<style>
    .custom_desktop_menu_none {
        display: none;
    }

    .custom_header_cart {
        padding-left: 120px;
        padding-top: 25px;
    }

    .custom_logo {
        width: 185px;
        margin-left: 15px;
    }

    @media only screen and (max-width: 600px) {
        .custom_desktop_menu_none {
            display: block;
        }

        .custom_mobile_menu_none {
            display: none;
        }

        .custom_logo_header {
            text-align: center;
        }

        .custom_header_cart {
            padding-left: 40px;
            padding-top: 20px;
        }

        .custom_logo {
            width: 120px;
            /* width: 60px; */
            margin-left: 0;
        }
    }
  .main-menu > nav > ul > li > a {
          font-size: 14px !important;
  }
  .main-categori-wrap .categori-dropdown-inner {
          min-width: 269px !important;
  }
</style>

<!-- Header  -->
<header class="sticky-bar">

    <div class="container">

        <!-- ******************** Mobile and Desktop header ******************** -->
        <div class="row mt-2">

            <div class="col-3 col-sm-3 custom_desktop_menu_none">
                <div class="burger-icon burger-icon-white" style="margin-top: 25px;margin-left: 7px;">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-3 col-lg-3 custom_logo_header">
                <a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}" class="custom_logo"
                        alt="logo" /></a>
            </div>

            <div class="col-md-6 col-lg-6 custom_mobile_menu_none">
                <div class="search-style-3" style="padding-top: 13px;">
                    <form action="{{ route('product.searching') }}">
                        @csrf
                        <input onfocus="search_result_show()" onblur="search_result_hide()" name="search"
                            id="search" placeholder="Search for items..." />
                        <div id="searchProducts"></div>
                    </form>
                </div>
            </div>

            <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                <div class="row">

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 custom_header_cart">
                        <div class="header-action-right" style="display: block;">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="#">
                                        <img alt=""
                                            src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                        <span class="pro-count blue" id="cartQty" style="background-color:#ffc95c">0</span>
                                    </a>
                                    {{-- <a href="{{ route('mycart') }}"><span class="lable">Cart</span></a> --}}
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">

                                        <!--   // mini cart start with ajax -->
                                        <div id="miniCart"></div>
                                        <!--   // End mini cart start with ajax -->

                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span id="cartSubTotal"> </span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{ route('mycart') }}"
                                                    style="width: 100%; text-align:center;">View
                                                    cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 custom_mobile_menu_none" style="padding-top: 20px;">
                        <div class="header-action-icon-2">
                            <a href="{{ route('login') }}">
                                <img class="svgInject" alt="Nest"
                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                            </a>


                            @auth
                                <a href="{{ route('dashboard') }}"><span class="lable ml-0">Account</span></a>
                                {{-- <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-user mr-10"></i>My
                                                Account</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard') }}"><i
                                                    class="fi fi-rs-location-alt mr-10"></i>Order
                                                Tracking</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-label mr-10"></i>My
                                                Voucher</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-heart mr-10"></i>My
                                                Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard') }}"><i
                                                    class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.logout') }}"><i
                                                    class="fi fi-rs-sign-out mr-10"></i>Sign
                                                out</a>
                                        </li>
                                    </ul>
                                </div> --}}
                            @else
                                <a href="{{ route('login') }}"><span class="lable ml-0">Login</span></a>

                                <span class="lable" style="margin-left: 2px; margin-right: 2px;"> | </span>


                                <a href="{{ route('register') }}"><span class="lable ml-0">Register</span></a>

                            @endauth




                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- ******************** End: Mobile and Desktop header ******************** -->


        <!-- ******************** Desktop Menus ******************** -->
        @php
            $categories = App\Models\Category::orderBy('shows', 'ASC')->get();
        @endphp
        <div class="row">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="header-nav d-none d-lg-flex">


                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categories-button-active btn" href="#" style="
    color: #000 !important;">
                                <span class="fi-rs-apps" style="color: #000;"></span> All Categories
                                <i class="fi-rs-angle-down" style="color: #000 !important;"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach ($categories as $item)
                                            @if ($loop->index < 7)
                                                <li>
                                                    <a
                                                        href="{{ url('product/category/' . $item->id . '/' . $item->category_slug) }}">
                                                        <img src="{{ asset($item->category_image) }}" alt="" />
                                                        {{ $item->category_name }} </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <!--<ul class="end">-->
                                    <!--    @foreach ($categories as $item)-->
                                    <!--        @if ($loop->index > 3)-->
                                    <!--            <li>-->
                                    <!--                <a-->
                                    <!--                    href="{{ url('product/category/' . $item->id . '/' . $item->category_slug) }}">-->
                                    <!--                    <img src="{{ asset($item->category_image) }}" alt="" />-->
                                    <!--                    {{ $item->category_name }} </a>-->
                                    <!--            </li>-->
                                    <!--        @endif-->
                                    <!--    @endforeach-->

                                    <!--</ul>-->
                                </div>
                            </div>
                        </div>


                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>

                                    <!--<li>-->
                                    <!--    <a class="active" href="{{ url('/') }}">Home </a>-->

                                    <!--</li>-->

                                    @php

                                        $categories = App\Models\Category::orderBy('shows', 'Asc')
                                            ->limit(7)
                                            ->get();
                                    @endphp

                                    @foreach ($categories as $category)
                                        <li>
                                            <a
                                                href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">{{ $category->category_name }}
                                                <i class="fi-rs-angle-down"></i></a>

                                            @php
                                                $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                                    ->orderBy('subcategory_name', 'ASC')
                                                    ->get();
                                            @endphp

                                            <ul class="sub-menu">
                                                @foreach ($subcategories as $subcategory)
                                                    <li><a
                                                            href="{{ url('product/subcategory/' . $subcategory->id . '/' . $subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach

                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ******************** End: Desktop Menus ******************** -->

    </div>

</header>
<!-- End Header  -->



<!-- ******************** Mobile Sidebar Menusr ******************** -->
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}" alt="logo"
                        class="custom_logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="{{ route('product.searching') }}" method="post">
                    @csrf
                    <input onfocus="search_result_show()" onblur="search_result_hide()" name="search"
                        id="search" placeholder="Search for items..." />
                    <div id="searchProducts"></div>
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        @php
                            $categories = App\Models\Category::orderBy('shows', 'ASC')->get();
                        @endphp
                        @foreach ($categories as $category)
                            <li class="menu-item-has-children">
                                <a
                                    href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">{{ $category->category_name }}</a>
                                @php
                                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                        ->orderBy('subcategory_name', 'ASC')
                                        ->get();
                                @endphp
                                <ul class="dropdown">
                                    @foreach ($subcategories as $subcategory)
                                        <li>
                                            <a
                                                href="{{ url('product/subcategory/' . $subcategory->id . '/' . $subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                @auth
                    <div class="single-mobile-header-info">
                        <a href="{{ route('dashboard') }}"><i class="fi-rs-user"></i>My Account</a>
                    </div>
                @else
                    <div class="single-mobile-header-info">
                        <a href="{{ route('login') }}"><i class="fi-rs-user"></i>Login</a>
                        <a href="{{ route('register') }}"><i class="fi-rs-user"></i>Register</a>
                    </div>
                @endauth
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>{{ $setting->support_phone }}</a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="{{ $setting->facebook }}"><img
                        src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                        alt="" /></a>
                <a href="{{ $setting->twitter }}"><img
                        src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg') }}"
                        alt="" /></a>
                {{-- <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a> --}}
                <a href="{{ $setting->youtube }}"><img
                        src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                        alt="" /></a>
            </div>
        </div>
    </div>
</div>
<!-- ******************** End: Mobile Sidebar Menusr ******************** -->

