<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderReturnController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin Guard
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


// User ALL Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('user.dashboard');


// Frontend Auth Routes
Route::get('/', [IndexController::class, 'index']);
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('profile.show');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/profile/update-password', [IndexController::class, 'UserProfileChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

// Admin All Routes
Route::middleware(['auth:admin'])->group(function () {

    // Default dashboard for admin
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // Admin Auth Routes
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminProfileController::class, 'AdminUpdateePassword'])->name('admin.password.update');

    // Backend Brand Routes
    Route::prefix('brand')->group(function () {
        Route::get('/all/brand', [BrandController::class, 'BrandView'])->name('all.brand');
        Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/add/brand', [BrandController::class, 'BrandAdd'])->name('brand.store');
        Route::get('/edit/brand/{id}', [BrandController::class, 'EditBrand'])->name('brand.edit');
        Route::post('/update/brand/{id}', [BrandController::class, 'UpdateBrand'])->name('brand.update');
        Route::get('/delete/brand/{id}', [BrandController::class, 'DeleteBrand'])->name('brand.delete');
    });

    // Backend Category Routes
    Route::prefix('category')->group(function () {
        Route::get('/all/category', [CategoryController::class, 'CategoryView'])->name('all.category');
        Route::get('/category/create', [CategoryController::class, 'Create'])->name('category.create');
        Route::post('/add/category', [CategoryController::class, 'CategoryAdd'])->name('category.store');
        Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('category.edit');
        Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('category.update');
        Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('category.delete');

        // Sub Category
        Route::get('/all/subcategory', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
        Route::get('/subcategory/create', [SubCategoryController::class, 'Create'])->name('subcategory.create');
        Route::post('/add/subcategory', [SubCategoryController::class, 'SubCategoryAdd'])->name('subcategory.store');
        Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'EditSubCategory'])->name('subcategory.edit');
        Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'UpdateSubCategory'])->name('subcategory.update');
        Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('subcategory.delete');

        // SubSub Category
        Route::get('/all/subsubcategory', [SubSubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
        Route::get('/subsubcategory/create', [SubSubCategoryController::class, 'Create'])->name('subsubcategory.create');
        Route::post('/add/subsubcategory', [SubSubCategoryController::class, 'SubSubCategoryAdd'])->name('subsubcategory.store');
        Route::get('/edit/subsubcategory/{id}', [SubSubCategoryController::class, 'EditSubSubCategory'])->name('subsubcategory.edit');
        Route::post('/update/subsubcategory/{id}', [SubSubCategoryController::class, 'UpdateSubSubCategory'])->name('subsubcategory.update');
        Route::get('/delete/subsubcategory/{id}', [SubSubCategoryController::class, 'DeleteSubSubCategory'])->name('subsubcategory.delete');

        // Subcategory ajax
        Route::get('/subcategory/ajax/{id}', [SubSubCategoryController::class, 'GetSubCategory']);
        Route::get('/subsubcategory/ajax/{id}', [SubSubCategoryController::class, 'GetSubSubCategory']);
    });


    // Backend Blog Routes 
    Route::prefix('blogs')->group(function () {
        Route::get('/all/blog/category', [BlogController::class, 'BlogCategory'])->name('all.blog.category');
        Route::post('/blog/category/create', [BlogController::class, 'BlogCategoryAdd'])->name('blog.category.store');
        Route::post('/blog/category/edit/{id}', [BlogController::class, 'BlogCategoryUpdate'])->name('blog.category.edit');
        Route::get('/blog/category/delete/{id}', [BlogController::class, 'BlogCategoryDelete'])->name('blog.category.delete');

        // All Blogs Routes 
        Route::get('/all/blogs', [BlogController::class, 'AllBlogs'])->name('all.blog');
        Route::get('/add/blogs', [BlogController::class, 'AddBlogs'])->name('add-blogs');
        Route::post('/blog/create', [BlogController::class, 'BlogCreate'])->name('create.blog.post');
        Route::get('/edit/blogs/{id}', [BlogController::class, 'EditBlog'])->name('blog.edit');
        Route::post('/blog/update/{id}', [BlogController::class, 'BlogUpdate'])->name('blogs.update');
        Route::get('/delete/blogs/{id}', [BlogController::class, 'DeleteBlog'])->name('blog.delete');
    });


    // Backend Product Routes
    Route::prefix('product')->group(function () {
        Route::get('/add/add-product', [ProductController::class, 'AddProduct'])->name('add-product');
        Route::post('/store/store-product', [ProductController::class, 'StoreProduct'])->name('product-store');
        Route::get('/manage-product', [ProductController::class, 'ManageProduct'])->name('manage-product');
        Route::get('/edit-product/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
        Route::post('/update/product', [ProductController::class, 'UpdateProduct'])->name('product.update');
        Route::get('/delete/image/{id}', [ProductController::class, 'DeleteImage'])->name('delete.image');
        Route::get('/activate/{id}', [ProductController::class, 'ActivateProduct'])->name('product.activate');
        Route::get('/deactivate/{id}', [ProductController::class, 'DeactivateProduct'])->name('product.deactivate');
        Route::get('/delete/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.product');

        Route::post('upload/multiple/image', [ProductController::class, 'UploadMulImgs'])->name('multiple.images');
    });

    // Backend Slider Routes
    Route::prefix('slider')->group(function () {
        Route::get('/manage-slider', [SliderController::class, 'ManageSlider'])->name('manage-slider');
        Route::get('/slider/add', [SliderController::class, 'AddSldier'])->name('slider.add');
        Route::post('/slider/store', [SliderController::class, 'SliderStore'])->name('slider.store');
        Route::get('/activate/{id}', [SliderController::class, 'ActivateSlider'])->name('slider.activate');
        Route::get('/deactivate/{id}', [SliderController::class, 'DeactivateSlider'])->name('slider.deactivate');
        Route::get('/edit/{id}', [SliderController::class, 'EditSlider'])->name('edit.slider');
        Route::post('/slider/update', [SliderController::class, 'UpdateSlider'])->name('slider.update');
        Route::get('/slider/delete/{id}', [SliderController::class, 'DeleteSlider'])->name('delete.slider');
    });

    // Backend Coupon Routes
    Route::prefix('coupons')->group(function () {
        Route::get('/manage-coupons', [CouponController::class, 'ViewCoupons'])->name('manage-coupons');
        Route::get('/coupon/create', [CouponController::class, 'AddCoupon'])->name('coupon.create');
        Route::post('/coupon/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
        Route::get('/coupon/edit/{id}', [CouponController::class, 'EditCoupon'])->name('coupon.edit');
        Route::post('/coupon/update/{id}', [CouponController::class, 'UpdateCoupon'])->name('coupon.update');
        Route::get('/coupon/delete/{id}', [CouponController::class, 'DeleteCoupon'])->name('coupon.delete');
    });

    // Shipping all routes
    Route::prefix('shipping')->group(function () {
        Route::get('/manage-divisions', [ShippingAreaController::class, 'ViewDivisions'])->name('manage-divisions');
        Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
        Route::post('/division/edit/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.edit');
        Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');

        Route::get('/manage-district', [ShippingAreaController::class, 'ViewDisctricts'])->name('manage-district');
        Route::post('/district/store', [ShippingAreaController::class, 'DisctrictStore'])->name('district.store');
        Route::post('/district/edit/{id}', [ShippingAreaController::class, 'DisctrictUpdate'])->name('district.edit');
        Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DisctrictDelete'])->name('district.delete');

        Route::get('/manage-state', [ShippingAreaController::class, 'ViewStates'])->name('manage-state');
        Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');
        Route::post('/state/edit/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.edit');
        Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');
    });



    // Orders all routes 
    Route::prefix('orders')->group(function () {

        Route::get('/pending/orders', [OrdersController::class, 'PendingOrders'])->name('pending-orders');
        Route::get('/pending/order/details/{id}', [OrdersController::class, 'PendingOrderDetails'])->name('pending.orders.details');
        Route::get('/confirm/orders', [OrdersController::class, 'ConfirmOrders'])->name('confirmed-orders');
        Route::get('/processing/orders', [OrdersController::class, 'ProcessingOrders'])->name('processing-orders');
        Route::get('/picked/orders', [OrdersController::class, 'PickedOrders'])->name('picked-orders');
        Route::get('/shipped/orders', [OrdersController::class, 'ShippedOrders'])->name('shipped-orders');
        Route::get('/delivered/orders', [OrdersController::class, 'DeliveredOrders'])->name('delivered-orders');
        Route::get('/cancelled/orders', [OrdersController::class, 'CancelledOrders'])->name('cancelled-orders');

        // confirm order 
        Route::get('/confirm/order/{id}', [OrdersController::class, 'ConfirmOrder'])->name('pending-confirm');
        // order processed
        Route::get('/process/order/{id}', [OrdersController::class, 'ProcessOrder'])->name('pending-processing');
        // order picked        
        Route::get('/order/picked/{id}', [OrdersController::class, 'OrderPicked'])->name('pending-picked');
        // pending-shipped
        Route::get('/order/shipped/{id}', [OrdersController::class, 'OrderShipped'])->name('pending-shipped');
        // pending-delivered
        Route::get('/order/delivered/{id}', [OrdersController::class, 'OrderDelivered'])->name('pending-delivered');
        // pending-cancelled
        Route::get('/order/cancelled/{id}', [OrdersController::class, 'OrderCancelled'])->name('pending-cancelled');
        // invoice.download
        Route::get('/invoice/download/{id}', [OrdersController::class, 'InvoiceDownload'])->name('invoice.download');
    });

    // Orders Return Request 
    Route::prefix('return')->group(function () {
        // all pending request
        Route::get('/admin/order/return', [OrderReturnController::class, 'ReturnOrders'])->name('return.request');
        // approve return request
        Route::get('/admin/return/approve/{id}', [OrderReturnController::class, 'ApproveReturn'])->name('return.approve');
        // all returns
        Route::get('/admin/all/return', [OrderReturnController::class, 'AllReturns'])->name('all.return');
    });

    // site settings routes 
    Route::prefix('setting')->group(function () {
        Route::get('/site/setting', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');
        Route::post('/site/setting/update/{id}', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.site.settings');
        // seo settings 
        Route::get('/seo/setting', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting');
        Route::post('/seo/setting/update/{id}', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seo.setting');
    });

    // Admin sales routes 
    Route::prefix('reports')->group(function () {
        Route::get('/all/reports', [ReportController::class, 'AllReports'])->name('all-reports');
        Route::post('/search/by/date', [ReportController::class, 'SearchByDate'])->name('search.date.reports');
        Route::post('/search/by/month', [ReportController::class, 'SearchByMonth'])->name('search.month.reports');
        Route::post('/search/by/year', [ReportController::class, 'SearchByYear'])->name('search.year.reports');
    });

    // list all customers users list 
    Route::prefix('allusers')->group(function () {
        Route::get('/all/users', [AdminProfileController::class, 'AllUsers'])->name('all-users');
    });

    // manage admin roles 
    Route::prefix('adminuserrole')->group(function () {
        Route::get('/all/admin/users', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');
        Route::get('/all/admin/role', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');
        Route::post('/admin/user/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
        Route::get('/edit/admin/{id}', [AdminUserController::class, 'EditAdmin'])->name('edit.admin.user');
        Route::post('/update/admin/{id}', [AdminUserController::class, 'UpdateAdmin'])->name('admin.user.update');
        Route::get('/delete/admin/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');
    });

    // all customers reviews list  
    Route::prefix('reviews')->group(function () {
        Route::get('/all/reviews', [ReviewController::class, 'AllReviews'])->name('all.reviews');
        Route::get('/approve/reviews/{id}', [ReviewController::class, 'ApproveReviews'])->name('approve.review');
        Route::get('/disapprove/reviews/{id}', [ReviewController::class, 'DisableReview'])->name('disable.review');
        Route::get('/delete/reviews/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');
    });

    // manage stock 
    Route::prefix('stock')->group(function () {
        Route::get('/product/stock', [ProductController::class, 'ProductStock'])->name('product.stock');
    });
});

// get shipping district ajax
Route::get('/shipping/district/{id}', [ShippingAreaController::class, 'GetDistrict']);
// Frontend all routes
// Multi Language All Routes
Route::get('/language/nepali', [LanguageController::class, 'Nepali'])->name('nepali.language');
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
// Frontend Product Details page url
Route::get('product/detais/{id}/{slug}', [IndexController::class, 'ProductDetails'])->name('product.detais');
Route::get('product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
// Subcategory products
Route::get('subcategory/product/{id}/{slug}', [IndexController::class, 'SubCategoryProducts'])->name('subcategory.product');
// Subsubcategory products
Route::get('subsubcategory/product/{id}/{slug}', [IndexController::class, 'SubSubCategoryProducts'])->name('subsubcategory.product');
// Product View Modal With Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
// Add To Cart Using AJAX
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
// mini cart get data
Route::get('/product/mini/cart', [CartController::class, 'MiniCart']);
// remove mini cart product
Route::get('/mini/cart/product/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
// get cart 
Route::get('/my-cart/get-mycart-product', [CartPageController::class, 'GetMyCartProduct']);
Route::get('/remove/cart/product/{id}', [CartPageController::class, 'RemoveCartProduct']);
Route::get('/cart/product/increment/{id}', [CartPageController::class, 'IncrementCartProduct']);
Route::get('/cart/product/decrement/{id}', [CartPageController::class, 'DecrementCartProduct']);
// frontend blogs routes  
Route::get('/blogs', [HomeBlogController::class, 'AllBlogPost'])->name('home.blog');
Route::get('/blog/detail/{slug}', [HomeBlogController::class, 'BlogDetail'])->name('blog.details');
// Product search 
Route::post('/search', [IndexController::class, 'SearchProduct'])->name('product.search');
// advance search
Route::post('/advance-search', [IndexController::class, 'AdvanceSearchProduct']);
// shop page 
Route::get('/shop', [ShopController::class, 'ShopPage'])->name('shop.page');




Route::group(['middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    // add to wishlist
    Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);
    Route::get('/wishlist', [WishlistController::class, 'GetWishlist'])->name('wishlist');
    Route::get('/my-wishlist/get-wishlist-product', [WishlistController::class, 'GetWishlistData']);
    Route::get('/remove/wishlist/{id}', [WishlistController::class, 'RemoveWishlist']);
    // Frontend Apply Coupon
    Route::post('/apply/coupon', [CartController::class, 'ApplyCoupon']);
    // Coupon calculator /coupon-calculator
    Route::get('/coupon-calculator', [CartController::class, 'CouponCalculator']);
    // Remove coupon 
    Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);
    // Checkout Routes
    Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
    // Get District using ajax...
    Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'GetDistrict']);
    // Get state using ajax...
    Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'GetState']);
    // Checkout Store
    Route::post('/checkout', [CheckoutController::class, 'StoreCheckout'])->name('checkout.store');
    // Stripe payment 
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    // Cash payment 
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
    // Get all user Orders
    Route::get('/user/order', [AllUserController::class, 'MyOrders'])->name('my.orders');
    // Get ordered items 
    Route::get('/order/details/{id}', [AllUserController::class, 'OrderDetails'])->name('order.details');
    // Download Invoice 
    Route::get('/download/invoice/{id}', [AllUserController::class, 'DownloadInvoice'])->name('user.invoice.download');
    // cancel.order
    Route::post('/cancel/order', [AllUserController::class, 'ReturnOrder'])->name('cancel.order');
    // return.orders.list
    Route::get('/return/order/list', [AllUserController::class, 'ReturnOrders'])->name('return.orders.list');
    // cancel.orders
    Route::get('/cancel/orders/list', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');
    // review.store
    Route::post('/review/store', [ReviewController::class, 'StoreReview'])->name('review.store');

    // order tracking 
    Route::post('/order/tracking', [AllUserController::class, 'OrderTracking'])->name('order.tracking');
});


