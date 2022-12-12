@extends('frontend.main_master')
@section('content')
@section('title')
@if(session()->get('language') == 'nepali')
{{ $blogpost->post_title_nep}}
@else
{{ $blogpost->post_title_en}}
@endif
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>
                    @if(session()->get('language') == 'nepali')
                    {{ $blogpost->post_title_nep}}
                    @else
                    {{ $blogpost->post_title_en}}
                    @endif
                </li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
                    <div class="blog-post wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <img class="img-responsive" src="{{ asset(''.$blogpost->post_image) }}" alt="">
                        <h1>
                            @if(session()->get('language') == 'nepali')
                            {{ $blogpost->post_title_nep}}
                            @else
                            {{ $blogpost->post_title_en}}
                            @endif
                        </h1>
                        <span class="author">Dipendra Khadka</span>
                        <span class="review">7 Comments</span>
                        <span class="date-time">{{Carbon\Carbon::parse($blogpost->created_at)->diffForHumans()}}</span>
                        <p>
                            @if(session()->get('language') == 'nepali')
                            {!! $blogpost->post_description_hin !!}
                            @else
                            {!! $blogpost->post_description_en !!}
                            @endif
                        </p>
                        <div class="social-media">
                            <span>share post:</span>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                    </div>
                    <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                        <form class="register-form" role="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Leave A Comment</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                        <textarea class="form-control unicase-form-control" id="exampleInputComments"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 outer-bottom-small m-t-20">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-md-3 sidebar">
                    <div class="sidebar-module-container">
                        <div class="search-area outer-bottom-small">
                            <form>
                                <div class="control-group">
                                    <input placeholder="Type to search" class="search-field">
                                    <a href="#" class="search-button"></a>
                                </div>
                            </form>
                        </div>

                        <div class="home-banner outer-top-n outer-bottom-xs">
                            <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                        </div>
                        <!-- ==============================================CATEGORY============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                            <h3 class="section-title">Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">
                                    <ul class="list-group list-group-flush">
                                        @foreach($blogcategory as $category)
                                        <li class="list-group-item">
                                            @if(session()->get('language') == 'nepali')
                                            {{ $category->blog_category_name_nep}}
                                            @else
                                            {{ $category->blog_category_name_en}}
                                            @endif

                                        </li>
                                        @endforeach
                                    </ul>

                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== CATEGORY : END ============================================== -->
                        <!-- ============================================== PRODUCT TAGS ============================================== -->
                        @include('frontend.common.product_tags')
                        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div><!-- /.body-content -->

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-635e4505fd03455e"></script>
@endsection