@php
$categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach($categories as $category)
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon {{$category->category_icon}}" aria-hidden="true"></i>
                    @if(session()->get('language') == 'nepali')
                    {{$category->category_name_hin}}
                    @else
                    {{$category->category_name_en}}
                    @endif
                </a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @php
                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('sub_category_en', 'ASC')->get();
                            @endphp
                            @foreach($subcategories as $subcategory)
                            <div class="col-sm-12 col-md-3">
                                <a href="{{ route('subcategory.product',[ 'id' => $subcategory -> id, 'slug' => $subcategory->sub_category_en_slug]) }}">
                                    <h2 class="title">
                                        @if(session()->get('language') == 'nepali')
                                        {{$subcategory->sub_category_hin}}
                                        @else
                                        {{$subcategory->sub_category_en}}
                                        @endif
                                    </h2>
                                </a>
                                <ul class="links list-unstyled">
                                    @php
                                    $subsubcategories = App\Models\SubSubCategory::where('sub_category_id', $subcategory->id)->orderBy('sub_sub_category_en', 'ASC')->get();
                                    @endphp
                                    @foreach($subsubcategories as $subsubcategory)

                                    <li>
                                        <a href="{{ route('subsubcategory.product',[ 'id' => $subsubcategory -> id, 'slug' => $subsubcategory->sub_sub_category_en]) }}">
                                            @if(session()->get('language') == 'nepali')
                                            {{$subsubcategory->sub_sub_category_hin}}

                                            @else
                                            {{$subsubcategory->sub_sub_category_en}}
                                            @endif
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            @endforeach

            <!-- /.menu-item -->


            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                <!-- /.dropdown-menu -->
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
            </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>