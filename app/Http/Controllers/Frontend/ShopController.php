<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class ShopController extends Controller
{
    public function ShopPage()
    {
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('frontend.shop.shop_page', compact('products', 'categories'));
    }
}
