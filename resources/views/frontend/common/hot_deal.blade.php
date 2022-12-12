@php
$hot_deals = App\Models\Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach($hot_deals as $hot_deal)
        <div class="item">
            <div class="products">
                <div class="hot-deal-wrapper">
                    <div class="image">
                        <img src="{{ asset(''.$hot_deal->product_thumbnail) }}" alt="{{ $hot_deal->product_name_en }}">

                    </div>
                    @php
                    $disc_percentage = ($hot_deal->discount_price * 100) / $hot_deal->selling_price ;
                    @endphp

                    <div class="sale-offer-tag">
                        @if($hot_deal->discount_price == NULL || $hot_deal->discount_price == 0)
                        <span>New</span>
                        @else
                        <span>{{ round($disc_percentage, 2) }}%<br>
                            off</span>
                        @endif
                    </div>

                </div>
                <!-- /.hot-deal-wrapper -->

                <div class="product-info text-left m-t-20">
                    <h3 class="name">
                        <a href="{{ route('product.detais',[ 'id' => $hot_deal -> id, 'slug' => $hot_deal->product_slug_en]) }}">
                            @if(session()->get('language') == 'nepali')
                            {{ Str::limit($hot_deal->product_name_hin, 40)}}
                            @else
                            {{ Str::limit($hot_deal->product_name_en, 40)}}
                            @endif
                        </a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price">
                        @if($hot_deal->discount_price == NULL || $hot_deal->discount_price == 0)
                        <span class="price"> Rs{{$hot_deal->selling_price}} </span>
                        @else
                        <span class="price"> Rs{{$hot_deal->selling_price - $hot_deal->discount_price}} </span>
                        <span class="price-before-discount">Rs {{$hot_deal->selling_price}}</span>
                        @endif
                    </div>
                    <!-- /.product-price -->

                </div>
                <!-- /.product-info -->

                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <div class="add-cart-button btn-group">
                            <button id="{{$hot_deal->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                            <button id="{{$hot_deal->id}}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </div>
                    </div>
                    <!-- /.action -->
                </div>
                <!-- /.cart -->
            </div>
        </div>
        @endforeach


    </div>
    <!-- /.sidebar-widget -->
</div>