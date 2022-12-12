@extends('frontend.main_master')
@section('content')
@section('title')
Flipmart Ecom Shop
@endsection
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
                @include('frontend.common.vertical_menu')
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <!-- ============================================== HOT DEALS ============================================== -->
                @include('frontend.common.hot_deal')

                <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Offer</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach($special_offers as $special_offer)
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="{{ route('product.detais',[ 'id' => $special_offer -> id, 'slug' => $special_offer->product_slug_en]) }}">
                                                                <img src="{{ asset(''.$special_offer->product_thumbnail) }}" alt="{{ $special_offer->product_name_en }}" alt="">
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            <a href="{{ route('product.detais',[ 'id' => $special_offer -> id, 'slug' => $special_offer->product_slug_en]) }}">
                                                                @if(session()->get('language') == 'nepali')
                                                                {{ Str::limit($special_offer->product_name_hin, 25) }}
                                                                @else
                                                                {{ Str::limit($special_offer->product_name_en, 25) }}
                                                                @endif
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> Rs {{ $special_offer->selling_price }} </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== PRODUCT TAGS ============================================== -->
                @include('frontend.common.product_tags')
                <!-- /.sidebar-widget -->
                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Deals</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach($special_deals as $special_deal)
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="{{ route('product.detais',[ 'id' => $special_deal -> id, 'slug' => $special_deal->product_slug_en]) }}">
                                                                <img src="{{ asset(''.$special_deal->product_thumbnail) }}" alt="{{ $special_deal->product_name_en }}" alt="">
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            <a href="{{ route('product.detais',[ 'id' => $special_deal -> id, 'slug' => $special_deal->product_slug_en]) }}">
                                                                @if(session()->get('language') == 'nepali')
                                                                {{ Str::limit($special_deal->product_name_hin, 25) }}
                                                                @else
                                                                {{ Str::limit($special_deal->product_name_en, 25) }}
                                                                @endif
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> Rs {{ $special_deal->selling_price }} </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                <!-- ============================================== NEWSLETTER ============================================== -->
                <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                    <h3 class="section-title">Newsletters</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <p>Sign Up for Our Newsletter!</p>
                        <form>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                            </div>
                            <button class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== NEWSLETTER: END ============================================== -->

                <!-- ============================================== Testimonials============================================== -->
                @include('frontend.common.testimonials')

                <!-- ============================================== Testimonials: END ============================================== -->

                <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach($sliders as $slider)
                        <div class="item" style="background-image: url({{ asset(''.$slider->slider_img)}});">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
                                    <div class="big-text fadeInDown-1"> {{$slider->title}} </div>
                                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{!! $slider->description !!}</span> </div>
                                    <div class="button-holder fadeInDown-3"> <a href="#" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">money back</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 Days Money Back Guarantee</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over $99</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Extra $5 off on all items </h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">New Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                            @foreach($categories as $category)
                            <li>
                                <a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">
                                    @if(session()->get('language') == 'nepali')
                                    {{$category->category_name_hin}}
                                    @else
                                    {{$category->category_name_en}}
                                    @endif
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">

                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach($products as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ route('product.detais',[ 'id' => $product -> id, 'slug' => $product->product_slug_en]) }}">
                                                            <img src="{{ asset(''.$product->product_thumbnail) }}" alt="{{$product->product_name_en}}">
                                                        </a>
                                                    </div>
                                                    <!-- /.image -->
                                                    @php
                                                    $disc_percentage = ($product->discount_price * 100) / $product->selling_price ;
                                                    @endphp
                                                    <div>
                                                        @if($product->discount_price == NULL)
                                                        <div class="tag new"><span>new</span></div>
                                                        @else
                                                        <div class="tag new" style="background: #ff7878;"> <span>{{ round($disc_percentage, 2) }}%</span></div>
                                                        @endif
                                                    </div>

                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a href="{{ route('product.detais',[ 'id' => $product -> id, 'slug' => $product->product_slug_en]) }}">
                                                            @if(session()->get('language') == 'nepali')
                                                            {{ Str::limit($product->product_name_hin, 25) }}
                                                            @else
                                                            {{ Str::limit($product->product_name_en, 25) }}
                                                            @endif
                                                        </a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    @if($product->discount_price == NULL)
                                                    <div class="product-price">
                                                        <span class="price"> Rs {{ $product->selling_price }} </span>
                                                    </div>
                                                    @else
                                                    <div class="product-price">
                                                        <span class="price"> Rs {{ $product->selling_price - $product->discount_price }} </span> <span class="price-before-discount">Rs {{ $product->selling_price }}</span>
                                                    </div>
                                                    @endif

                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button id="{{$product->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                            </li>
                                                            <li class="lnk wishlist">
                                                                <a class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                    @endforeach
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @foreach($categories as $category)
                        <div class="tab-pane" id="category{{$category->id}}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @php
                                    $catwiseProduct = App\Models\Product::where('category_id', $category->id)->where('status', 1)->orderBy('id', 'DESC')->get();
                                    @endphp
                                    @forelse($catwiseProduct as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ route('product.detais',[ 'id' => $product -> id, 'slug' => $product->product_slug_en]) }}">
                                                            <img src="{{ asset(''.$product->product_thumbnail) }}" alt="">
                                                        </a>
                                                    </div>
                                                    <!-- /.image -->

                                                    @php
                                                    $disc_percentage = ($product->discount_price * 100) / $product->selling_price ;
                                                    @endphp
                                                    <div>
                                                        @if($product->discount_price == NULL)
                                                        <div class="tag new"><span>new</span></div>
                                                        @else
                                                        <div class="tag new" style="background: #ff7878;"> <span>{{ round($disc_percentage, 2) }}%</span></div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a href="{{ route('product.detais',[ 'id' => $product -> id, 'slug' => $product->product_slug_en]) }}">
                                                            @if(session()->get('language') == 'nepali')
                                                            {{ Str::limit($product->product_name_hin, 25) }}
                                                            @else
                                                            {{ Str::limit($product->product_name_en, 25) }}
                                                            @endif
                                                        </a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        @if($product->discount_price == NULL)
                                                        <div class="product-price">
                                                            <span class="price"> Rs {{ $product->selling_price }} </span>
                                                        </div>
                                                        @else
                                                        <div class="product-price">
                                                            <span class="price"> Rs {{ $product->selling_price - $product->discount_price }} </span>
                                                            <span class="price-before-discount">Rs {{ $product->selling_price }}</span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button id="{{$product->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                            </li>
                                                            <li class="lnk wishlist">
                                                                <a class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                    @empty
                                    <h5 class="text-danger">No Product Found</h5>
                                    @endforelse
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        @endforeach


                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner1.jpg')}}" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner2.jpg')}}" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Featured products</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($featured_products as $featured)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="{{ route('product.detais',[ 'id' => $featured -> id, 'slug' => $featured->product_slug_en]) }}">
                                                <img src="{{ asset(''.$featured->product_thumbnail) }}" alt="{{ $featured->product_name_en }}">
                                            </a>
                                        </div>
                                        <!-- /.image -->
                                        @php
                                        $disc_percentage = ($featured->discount_price * 100) / $featured->selling_price ;
                                        @endphp
                                        <div class="tag hot">
                                            @if($featured->discount_price != NULL && $featured->discount_price != 0 )
                                            <span>{{ round($disc_percentage, 2) }}%</span>
                                            @else
                                            <span>not</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a href="{{ route('product.detais',[ 'id' => $featured -> id, 'slug' => $featured->product_slug_en]) }}">
                                                @if(session()->get('language') == 'nepali')
                                                {{ Str::limit($featured->product_name_hin, 25) }}
                                                @else
                                                {{ Str::limit($featured->product_name_en, 25) }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price">
                                            @if($featured->discount_price == NULL || $featured->discount_price == 0)
                                            <span class="price"> Rs{{$featured->selling_price}} </span>
                                            @else
                                            <span class="price"> Rs{{$featured->selling_price - $featured->discount_price}} </span>
                                            <span class="price-before-discount">Rs {{$featured->selling_price}}</span>
                                            @endif
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="{{$featured->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" id="{{$featured->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach

                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

                <!-- ============================================== SKIP 0 PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'nepali')
                        {{ Str::limit($skip_category_0->category_name_hin, 25) }}
                        @else
                        {{ Str::limit($skip_category_0->category_name_en, 25) }}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($skip_product_0 as $product_0)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="{{ route('product.detais',[ 'id' => $product_0 -> id, 'slug' => $product_0->product_slug_en]) }}">
                                                <img src="{{ asset(''.$product_0->product_thumbnail) }}" alt="{{ $product_0->product_name_en }}">
                                            </a>
                                        </div>
                                        <!-- /.image -->
                                        @php
                                        $disc_percentage = ($product_0->discount_price * 100) / $product_0->selling_price ;
                                        @endphp
                                        <div class="tag hot">
                                            @if($product_0->discount_price != NULL && $product_0->discount_price != 0 )
                                            <span>{{ round($disc_percentage, 2) }}%</span>
                                            @else
                                            <span>not</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a href="{{ route('product.detais',[ 'id' => $product_0 -> id, 'slug' => $product_0->product_slug_en]) }}">
                                                @if(session()->get('language') == 'nepali')
                                                {{ Str::limit($product_0->product_name_hin, 25) }}
                                                @else
                                                {{ Str::limit($product_0->product_name_en, 25) }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price">
                                            @if($product_0->discount_price == NULL || $product_0->discount_price == 0)
                                            <span class="price"> Rs{{$product_0->selling_price}} </span>
                                            @else
                                            <span class="price"> Rs{{$product_0->selling_price - $product_0->discount_price}} </span>
                                            <span class="price-before-discount">Rs {{$product_0->selling_price}}</span>
                                            @endif
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="{{$product_0->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" id="{{$product_0->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach

                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== SKIP 0 PRODUCTS : END ============================================== -->

                <!-- ============================================== SKIP 1 PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'nepali')
                        {{ Str::limit($skip_category_1->category_name_hin, 25) }}
                        @else
                        {{ Str::limit($skip_category_1->category_name_en, 25) }}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($skip_product_1 as $product_1)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="{{ route('product.detais',[ 'id' => $product_1 -> id, 'slug' => $product_1->product_slug_en]) }}">
                                                <img src="{{ asset(''.$product_1->product_thumbnail) }}" alt="{{ $product_1->product_name_en }}">
                                            </a>
                                        </div>
                                        <!-- /.image -->
                                        @php
                                        $disc_percentage = ($product_1->discount_price * 100) / $product_1->selling_price ;
                                        @endphp
                                        <div class="tag hot">
                                            @if($product_1->discount_price != NULL && $product_1->discount_price != 0 )
                                            <span>{{ round($disc_percentage, 2) }}%</span>
                                            @else
                                            <span>not</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a href="{{ route('product.detais',[ 'id' => $product_1 -> id, 'slug' => $product_1->product_slug_en]) }}">
                                                @if(session()->get('language') == 'nepali')
                                                {{ Str::limit($product_1->product_name_hin, 25) }}
                                                @else
                                                {{ Str::limit($product_1->product_name_en, 25) }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price">
                                            @if($product_1->discount_price == NULL || $product_1->discount_price == 0)
                                            <span class="price"> Rs{{$product_1->selling_price}} </span>
                                            @else
                                            <span class="price"> Rs{{$product_1->selling_price - $product_1->discount_price}} </span>
                                            <span class="price-before-discount">Rs {{$product_1->selling_price}}</span>
                                            @endif
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="{{$product_1->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" id="{{$product_1->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach

                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== SKIP 1 PRODUCTS : END ============================================== -->


                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg')}}" alt=""> </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Mens Fashion<br>
                                            <span class="shopping-needs">Save up to 40% off</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

                <!-- ============================================== SKIP 1 BRAND ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'nepali')
                        {{ Str::limit($skip_brand_0->brand_name_hin, 25) }}
                        @else
                        {{ Str::limit($skip_brand_0->brand_name_en, 25) }}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($skip_brand_product_0 as $brand_product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="{{ route('product.detais',[ 'id' => $brand_product -> id, 'slug' => $brand_product->product_slug_en]) }}">
                                                <img src="{{ asset(''.$brand_product->product_thumbnail) }}" alt="{{ $brand_product->product_name_en }}">
                                            </a>
                                        </div>
                                        <!-- /.image -->
                                        @php
                                        $disc_percentage = ($brand_product->discount_price * 100) / $brand_product->selling_price ;
                                        @endphp
                                        <div class="tag hot">
                                            @if($brand_product->discount_price != NULL && $brand_product->discount_price != 0 )
                                            <span>{{ round($disc_percentage, 2) }}%</span>
                                            @else
                                            <span>not</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a href="{{ route('product.detais',[ 'id' => $brand_product -> id, 'slug' => $brand_product->product_slug_en]) }}">
                                                @if(session()->get('language') == 'nepali')
                                                {{ Str::limit($brand_product->product_name_hin, 25) }}
                                                @else
                                                {{ Str::limit($brand_product->product_name_en, 25) }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price">
                                            @if($brand_product->discount_price == NULL || $brand_product->discount_price == 0)
                                            <span class="price"> Rs{{$brand_product->selling_price}} </span>
                                            @else
                                            <span class="price"> Rs{{$brand_product->selling_price - $brand_product->discount_price}} </span>
                                            <span class="price-before-discount">Rs {{$brand_product->selling_price}}</span>
                                            @endif
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="{{$brand_product->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" id="{{$brand_product->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach

                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== SKIP 1 BRAND : END ============================================== -->


                <!-- ============================================== BEST SELLER ============================================== -->

                <div class="best-deal wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title">Best seller</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p20.jpg')}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p21.jpg')}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p22.jpg')}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p23.jpg')}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p24.jpg')}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p25.jpg')}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p26.jpg')}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p27.jpg')}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->

                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">latest form blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">

                            @foreach ($blogpost as $post)
                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image">
                                            <a href="{{ route('blog.details', $post->post_title_slug_en)}}">
                                                <img src="{{ asset(''.$post->post_image) }}" alt="{{ $post->post_title_en}}">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name">
                                            <a href="{{ route('blog.details', $post->post_title_slug_en)}}">
                                                @if(session()->get('language') == 'nepali')
                                                {{ $post->post_title_nep}}
                                                @else
                                                {{ $post->post_title_en}}
                                                @endif
                                            </a>
                                        </h3>
                                        <span class="info">By Dipendra Khadka &nbsp;|&nbsp; {{Carbon\Carbon::parse($post->created_at)->diffForHumans()}} </span>
                                        <p class="text">
                                            @if(session()->get('language') == 'nepali')
                                            {!! Str::limit($post->post_description_hin, 200) !!}
                                            @else
                                            {!! Str::limit($post->post_description_en, 200) !!}
                                            @endif
                                        </p>
                                        <a href="{{ route('blog.details', $post->post_title_slug_en)}}" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->
                            @endforeach

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.blog-slider-container -->
                </section>
                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section wow fadeInUp new-arriavls">
                    <h3 class="section-title">New Arrivals</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p19.jpg')}}" alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="{{$product->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p28.jpg')}}" alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="{{$product->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p30.jpg')}}" alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="{{$product->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p1.jpg')}}" alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="{{$product->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p2.jpg')}}" alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag sale"><span>sale</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="{{$product->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img src="{{ asset('frontend/assets/images/products/p3.jpg')}}" alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag sale"><span>sale</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="{{$product->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" id="{{$product->id}}" onclick="addToWishlist(this.id)" href="#" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brand')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>

@endsection