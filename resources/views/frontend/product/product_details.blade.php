@extends('frontend.main_master')
@section('content')
@section('title')
{{$product->product_name_en}}
@endsection
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Clothing</a></li>
                <li class='active'>
                    @if(session()->get('language') == 'nepali')
                    {{$product->product_name_hin}}
                    @else
                    {{$product->product_name_en}}
                    @endif
                </li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <div class="home-banner outer-top-n">
                        <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                    </div>
                    <!-- ============================================== HOT DEALS ============================================== -->
                    @include('frontend.common.hot_deal')
                    <!-- ============================================== HOT DEALS: END ============================================== -->

                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
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
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member1.png')}}" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                <!-- /.container-fluid -->
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member3.png')}}" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member2.png')}}" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                                <!-- /.container-fluid -->
                            </div><!-- /.item -->

                        </div><!-- /.owl-carousel -->
                    </div>

                    <!-- ============================================== Testimonials: END ============================================== -->



                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    @foreach($multiImg as $imgs)
                                    <div class="single-product-gallery-item" id="slide{{$imgs->id}}">
                                        <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('').$imgs->photo_name }}">
                                            <img class="img-responsive" alt="" src="{{ asset('frontend/assets/images/blank.gif') }}" data-echo="{{ asset('').$imgs->photo_name }}" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->
                                    @endforeach


                                </div><!-- /.single-product-slider -->


                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">
                                        @foreach($multiImg as $imgs)
                                        <div class="item">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$imgs->id}}">
                                                <img class="img-responsive" width="85" alt="" src="{{ asset('frontend/assets/images/blank.gif') }}" data-echo="{{ asset('').$imgs->photo_name }}" />
                                            </a>
                                        </div>
                                        @endforeach

                                    </div><!-- /#owl-single-product-thumbnails -->



                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name" id="product_name">
                                    @if(session()->get('language') == 'nepali')
                                    {{$product->product_name_hin}}
                                    @else
                                    {{$product->product_name_en}}
                                    @endif
                                </h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(13 Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">
                                                    @if($product->product_qty > 1)
                                                    In Stock
                                                    @else
                                                    Out of Stock
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    @if(session()->get('language') == 'nepali')
                                    {{$product->short_description_hin}}
                                    @else
                                    {{$product->short_description_en}}
                                    @endif
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if($product->discount_price == NULL)
                                                <span class="price">Rs {{ $product->selling_price}}</span>
                                                @else
                                                <span class="price">Rs {{ $product->selling_price - $product->discount_price }}</span>
                                                <span class="price-strike">Rs {{ $product->selling_price}}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <!-- Add Product color and size -->
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            @if($product->product_color_en == NULL)
                                            @else
                                            <label class="info-title control-label">
                                                @if(session()->get('language') == 'nepali')
                                                रङ छान्नुहोस्
                                                @else
                                                Choose Color
                                                @endif
                                                <span>*</span></label>
                                            <select class="form-control unicase-form-control selectpicker" style="display: none;" id="color">
                                                <option selected disabled="disabled">--Choose color--</option>
                                                @if(session()->get('language') == 'nepali')
                                                @foreach($product_color_hin as $color_hin)
                                                <option>{{$color_hin}}</option>
                                                @endforeach
                                                @else
                                                @foreach($product_color_en as $color_en)
                                                <option>{{$color_en}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @endif

                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            @if($product->product_size_en == NULL)
                                            @else
                                            <label class="info-title control-label">
                                                @if(session()->get('language') == 'nepali')
                                                साइज छान्नुहोस्
                                                @else
                                                Choose Size
                                                @endif
                                                <span>*</span></label>
                                            <select class="form-control unicase-form-control selectpicker" style="display: none;" id="size">
                                                <option selected disabled>--Choose Size--</option>
                                                @if(session()->get('language') == 'nepali')
                                                @foreach($product_size_hin as $size_hin)
                                                <option>{{$size_hin}}</option>
                                                @endforeach
                                                @else
                                                @foreach($product_size_en as $size_en)
                                                <option>{{$size_en}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @endif

                                        </div>

                                    </div>

                                </div>


                                <!-- End Add Product color and size -->




                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <span class="label">Qty :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="text" value="1" id="quantity" value="1" min="1">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="" id="product_id" value="{{$product->id}}" min="1">

                                        <div class="col-sm-7">
                                            <button type="submit" href="#" class="btn btn-primary" onclick="addToCart()"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->

                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox"></div>


                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>

                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">
                                            @if(session()->get('language') == 'nepali')
                                            {!! $product->long_description_hin !!}
                                            @else
                                            {!! $product->long_description_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">

                                        <div class="product-reviews">
                                            <h4 class="title">Customer Reviews</h4>
                                            @php
                                            $reviews = App\Models\Review::where('product_id', $product->id)->where('status', 1)->latest()->limit(5)->get();
                                            @endphp

                                            @foreach($reviews as $review)
                                            <div class="reviews">

                                                <div class="review">
                                                    <div class="review-title">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <img src="{{ (!empty($review->user->profile_photo_path)) ? url('upload/user_images/'.$review->user->profile_photo_path) : url('upload/no_image.jpg') }}" alt="{{ $review->user->name}}" style="border-radius: 50%; width: 75px; height: 75px;">
                                                                <h5><strong>{{ $review->user->name}}</strong></h5>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <span class="summary">{{$review->summary}}</span>
                                                                <span class="date">
                                                                    <i class="fa fa-calendar"></i>
                                                                    <span>{{Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</span>
                                                                </span>
                                                                <div class="text">
                                                                    "{{$review->comment}}"
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div><!-- /.reviews -->
                                            @endforeach

                                        </div><!-- /.product-reviews -->

                                        <div class="product-add-review">
                                            <h4 class="title">Write your own review</h4>

                                            <div class="review-form">
                                                @guest
                                                <p>
                                                    <b>Please login to add product review.
                                                        <a href="{{ route('login')}}">Login Here.</a>
                                                    </b>
                                                </p>
                                                @else
                                                <div class="form-container">
                                                    <form class="register-form" role="form" action="{{ route('review.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputName" name="name" placeholder="" value="{{ Auth::user()->name}}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                                    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email" placeholder="" value="{{ Auth::user()->email}}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputTitle" name="summary" placeholder="" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                                                    <textarea class="form-control unicase-form-control" id="exampleInputComments" name="comment" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 outer-bottom-small m-t-20">
                                                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Review</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><!-- /.form-container -->
                                                @endguest

                                            </div><!-- /.review-form -->

                                        </div><!-- /.product-add-review -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                                <div id="tags" class="tab-pane">
                                    <div class="product-tag">

                                        <h4 class="title">Product Tags</h4>
                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-container">

                                                <div class="form-group">
                                                    <label for="exampleInputTag">Add Your Tags: </label>
                                                    <input type="email" id="exampleInputTag" class="form-control txt">


                                                </div>

                                                <button class="btn btn-upper btn-primary" type="submit">ADD
                                                    TAGS</button>
                                            </div><!-- /.form-container -->
                                        </form><!-- /.form-cnt -->

                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                    single quotes (') for phrases.</span>
                                            </div>
                                        </form><!-- /.form-cnt -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">upsell products</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                        @foreach($relatedProducts as $product)
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
                                                    <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
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
                        @endforeach

                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->


        <!-- ==== ================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brand')
        <!-- /.logo-slider -->
        <!-- == = BRANDS CAROUSEL : END = -->
    </div><!-- /.container -->
</div><!-- /.body-content -->


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-635e4505fd03455e"></script>
@endsection