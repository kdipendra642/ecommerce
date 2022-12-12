@php
$tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->limit(8)->get();
$tags_nep = App\Models\Product::groupBy('product_tags_hin')->select('product_tags_hin')->limit(8)->get();
@endphp
<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language') == 'nepali')
            @foreach($tags_nep as $tags_ne)
            <a class="item" title="{{$tags_ne->product_tags_hin}}" href="{{ url('product/tag/'. $tags_ne->product_tags_hin) }}">{{Str::replace(',', ' ', $tags_ne->product_tags_hin)}}</a>
            @endforeach
            @else
            @foreach($tags_en as $tags)
            <a class="item" title="{{$tags->product_tags_en}}" href="{{ url('product/tag/'. $tags->product_tags_en) }}">{{ Str::replace(',', ' ', $tags->product_tags_en, 10)}}</a>
            @endforeach
            @endif

        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>