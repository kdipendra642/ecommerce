<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\BlogPost;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    public function index()
    {
        $setting = SiteSetting::find(1);

        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $featured_products = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(10)->get();
        $special_offers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();


        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->get();

        $skip_brand_0 = Brand::skip(4)->first();
        $skip_brand_product_0 = Product::where('status', 1)->where('brand_id', $skip_brand_0->id)->orderBy('id', 'DESC')->get();

        $blogpost = BlogPost::latest()->get();

        return view('frontend.index', compact('categories', 'sliders', 'products', 'featured_products', 'special_offers', 'special_deals', 'skip_category_0', 'skip_product_0', 'skip_category_1', 'skip_product_1', 'skip_brand_0', 'skip_brand_product_0', 'blogpost', 'setting'));
    }

    public function TagWiseProduct($tags)
    {
        $products = Product::where('status', 1)->where('product_tags_en', $tags)->orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->paginate(3);
        return view('frontend.tags.tags_view', compact('products', 'categories'));
    }

    public function SubCategoryProducts($id, $slug)
    {
        $subcategory = SubCategory::findOrFail($id);
        $products = Product::where('status', 1)->where('subcategory_id', $subcategory->id)->orderBy('id', 'DESC')->paginate(3);

        $breadsubcat = SubCategory::where('id', $id)->get();

        return view('frontend.product.sub_category_product', compact('subcategory', 'products', 'breadsubcat'));
    }

    public function SubSubCategoryProducts($id, $slug)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        $products = Product::where('status', 1)->where('subsubcategory_id', $id)->orderBy('id', 'DESC')->paginate(3);

        $breadsubcat = SubSubCategory::where('id', $id)->get();

        return view('frontend.product.sub_sub_category_product', compact('subsubcategory', 'products', 'breadsubcat'));
    }





    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        // dd($request->all());
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile updated successfully.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function UserProfileChangePassword()
    {
        return view('frontend.profile.user_change_password');
    }

    public function UserPasswordUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required'
        ]);

        $hashedPassword = $data->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $data->password = Hash::make($request->password);
            $data->save();

            Auth::logout();

            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }

    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);

        // product color
        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_hin = $product->product_color_hin;
        $product_color_hin = explode(',', $color_hin);

        // product sizes
        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',', $size_hin);


        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();


        $multiImg = MultiImg::where('product_id', $product->id)->get();
        return view('frontend.product.product_details', compact('product', 'multiImg', 'product_color_en', 'product_color_hin', 'product_size_en', 'product_size_hin', 'relatedProducts'));
    }

    // Get Product with AJAX
    public function ProductViewAjax($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);

        // product color
        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        // product sizes
        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color_en,
            'size' => $product_size_en,
        ));
    }

    public function SearchProduct(Request $request)
    {
        $request->validate(["search_term" => "required"]);
        $item = $request->search_term;

        $products = Product::where('product_name_en', 'LIKE', "%$item%")->get();
        $categories = Category::where('category_name_en', 'ASC')->get();
        return view('frontend.search.search', compact('products', 'categories'));
    }

    public function AdvanceSearchProduct(Request $request)
    {
        $item = $request->search_term;

        $products = Product::where('product_name_en', 'LIKE', "%$item%")->select('id', 'product_name_en', 'product_thumbnail', 'product_slug_en')->limit(5)->get();
        $categories = Category::where('category_name_en', 'ASC')->get();
        return view('frontend.search.advance_search', compact('products', 'categories'));
    }
}
