<aside>
    <div id="sidebar" class="nav-collapse ">
        @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
        @endphp
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li class="">
                <a class="{{ ($route == 'dashboard') ? 'active' : ''}}" href="{{ url('admin/dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @php
            $brand = (auth()->guard('admin')->user()->brand == 1);
            $category = (auth()->guard('admin')->user()->category == 1);
            $product = (auth()->guard('admin')->user()->product == 1);
            $slider = (auth()->guard('admin')->user()->slider == 1);
            $coupons = (auth()->guard('admin')->user()->coupons == 1);
            $shipping = (auth()->guard('admin')->user()->shipping == 1);
            $orders = (auth()->guard('admin')->user()->orders == 1);
            $return_order = (auth()->guard('admin')->user()->return_order == 1);
            $reports = (auth()->guard('admin')->user()->reports == 1);
            $stock = (auth()->guard('admin')->user()->stock == 1);
            $allusers = (auth()->guard('admin')->user()->allusers == 1);
            $blogs = (auth()->guard('admin')->user()->blogs == 1);
            $setting = (auth()->guard('admin')->user()->setting == 1);
            $reviews = (auth()->guard('admin')->user()->reviews == 1);
            $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
            @endphp

            @if($brand == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/brand') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Brands</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'all.brand') ? 'active' : ''}}"><a href="{{ route('all.brand')}}">All Brand</a></li>
                </ul>
            </li>
            @endif
            @if($category == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/category') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Category</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'all.category') ? 'active' : ''}}"><a href="{{ route('all.category')}}">Category</a></li>
                    <li class="{{ ($route == 'all.subcategory') ? 'active' : ''}}"><a href="{{ route('all.subcategory')}}">SubCategory</a></li>
                    <li class="{{ ($route == 'all.subsubcategory') ? 'active' : ''}}"><a href="{{ route('all.subsubcategory')}}">Sub-SubCategory</a></li>
                </ul>
            </li>
            @endif
            @if($product == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/product') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Product</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'add-product') ? 'active' : ''}}"><a href="{{ route('add-product')}}">Add Product</a></li>
                    <li class="{{ ($route == 'manage-product') ? 'active' : ''}}"><a href="{{ route('manage-product')}}">Manage Product</a></li>
                </ul>
            </li>
            @endif
            @if($slider == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/slider') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Slider</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'manage-slider') ? 'active' : ''}}"><a href="{{ route('manage-slider')}}">Manage Slider</a></li>
                </ul>
            </li>

            @endif
            @if($coupons == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/coupons') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Coupons</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'manage-coupons') ? 'active' : ''}}"><a href="{{ route('manage-coupons')}}">Manage Coupons</a></li>
                </ul>
            </li>
            @endif
            @if($shipping == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/shipping') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Shipping Area</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'manage-divisions') ? 'active' : ''}}"><a href="{{ route('manage-divisions')}}">Manage Divisions</a></li>
                    <li class="{{ ($route == 'manage-district') ? 'active' : ''}}"><a href="{{ route('manage-district')}}">Manage Districts</a></li>
                    <li class="{{ ($route == 'manage-state') ? 'active' : ''}}"><a href="{{ route('manage-state')}}">Manage State</a></li>
                </ul>
            </li>
            @endif
            @if($orders == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/orders') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Orders Section</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'pending-orders') ? 'active' : ''}}"><a href="{{ route('pending-orders')}}">Pending Orders</a></li>
                    <li class="{{ ($route == 'confirmed-orders') ? 'active' : ''}}"><a href="{{ route('confirmed-orders')}}">Confirmed Orders</a></li>
                    <li class="{{ ($route == 'processing-orders') ? 'active' : ''}}"><a href="{{ route('processing-orders')}}">Processing Orders</a></li>
                    <li class="{{ ($route == 'picked-orders') ? 'active' : ''}}"><a href="{{ route('picked-orders')}}">Picked Orders</a></li>
                    <li class="{{ ($route == 'shipped-orders') ? 'active' : ''}}"><a href="{{ route('shipped-orders')}}">Shipped Orders</a></li>
                    <li class="{{ ($route == 'delivered-orders') ? 'active' : ''}}"><a href="{{ route('delivered-orders')}}">Delivered Orders</a></li>
                    <li class="{{ ($route == 'cancelled-orders') ? 'active' : ''}}"><a href="{{ route('cancelled-orders')}}">Cancelled Orders</a></li>
                </ul>
            </li>
            @endif
            @if($return_order == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/return') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Orders Return</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'return.request') ? 'active' : ''}}"><a href="{{ route('return.request')}}">Return Request</a></li>
                    <li class="{{ ($route == 'all.return') ? 'active' : ''}}"><a href="{{ route('all.return')}}">All Return Request</a></li>
                </ul>
            </li>

            @endif
            @if($reports == true)

            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/reports') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Reports</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'all-reports') ? 'active' : ''}}"><a href="{{ route('all-reports')}}">All Reports</a></li>
                </ul>
            </li>
            @endif
            @if($stock == true)

            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/stock') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Manage Stock</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'product.stock') ? 'active' : ''}}"><a href="{{ route('product.stock')}}">Product Stock</a></li>
                </ul>
            </li>
            @endif
            @if($allusers == true)

            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/allusers') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Users</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'all-users') ? 'active' : ''}}"><a href="{{ route('all-users')}}">All Users</a></li>
                </ul>
            </li>
            @endif
            @if($adminuserrole == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/adminuserrole') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Manage Admin User Role</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'all.admin.user') ? 'active' : ''}}"><a href="{{ route('all.admin.user')}}">All Admin Users</a></li>
                </ul>
            </li>
            @endif
            @if($blogs == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/blogs') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Manage Blogs</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'all.blog.category') ? 'active' : ''}}"><a href="{{ route('all.blog.category')}}">Blog Category</a></li>
                    <li class="{{ ($route == 'all.blog') ? 'active' : ''}}"><a href="{{ route('all.blog')}}">All Blogs</a></li>
                </ul>
            </li>
            @endif
            @if($setting == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/setting') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Manage Settings</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'site.setting') ? 'active' : ''}}"><a href="{{ route('site.setting')}}">Site Settings</a></li>
                    <li class="{{ ($route == 'seo.setting') ? 'active' : ''}}"><a href="{{ route('seo.setting')}}">SEO Settings</a></li>
                </ul>
            </li>
            @endif
            @if($reviews == true)
            <li class="sub-menu ">
                <a href="javascript:;" class="{{ ($prefix == '/reviews') ? 'active' : ''}}">
                    <i class="fa fa-laptop"></i>
                    <span>Manage Reviews</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($route == 'all.reviews') ? 'active' : ''}}"><a href="{{ route('all.reviews')}}">All Reviews</a></li>
                </ul>
            </li>
            @endif

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>