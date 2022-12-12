<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;


class ProductController extends Controller
{
    public function AddProduct()
    {
        $category = Category::latest()->get();
        $brands = Brand::latest()->get();

        return view('backend.product.product_add', compact('category', 'brands'));
    }

    public function StoreProduct(Request $request)
    {
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'buying_price' => $request->buying_price,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_description_en,
            'short_description_hin' => $request->short_description_hin,
            'long_description_en' => $request->long_description_en,
            'long_description_hin' => $request->long_description_hin,
            'status' => 0,
            'hot_deals' => $request->hot_deals,
            'special_offer' => $request->special_offer,
            'featured' => $request->featured,
            'special_deals' => $request->special_deals,
            'product_thumbnail' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        // multiple image upload 
        if ($request->file('photo_name')) {
            $images = $request->file('photo_name');
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(917, 1000)->save('upload/products/multiimg/' . $make_name);
                $upload_path = 'upload/products/multiimg/' . $make_name;

                MultiImg::insert([
                    'product_id' => $product_id,
                    'photo_name' => $upload_path,
                    'created_at' => Carbon::now(),
                ]);
            }
        }

        $notification = array(
            'message' => 'Product inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('manage-product')->with($notification);
    }

    public function ManageProduct()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('backend.product.product_view', compact('products'));
    }

    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $category = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();

        $products = Product::findorFail($id);

        return view('backend.product.product_edit', compact('category', 'subcategories', 'subsubcategories', 'brands', 'products', 'multiImgs'));
    }

    public function UpdateProduct(Request $request)
    {
        $product_id = $request->product_id;
        $old_img = $request->old_image;

        if ($request->file('product_thumbnail')) {
            unlink($old_img);
            $image = $request->file('product_thumbnail');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_gen);
            $save_url = 'upload/products/thumbnail/' . $name_gen;

            Product::findorFail($product_id)->update([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'product_name_en' => $request->product_name_en,
                'product_name_hin' => $request->product_name_hin,
                'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
                'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'buying_price' => $request->buying_price,
                'product_tags_en' => $request->product_tags_en,
                'product_tags_hin' => $request->product_tags_hin,
                'product_size_en' => $request->product_size_en,
                'product_size_hin' => $request->product_size_hin,
                'product_color_en' => $request->product_color_en,
                'product_color_hin' => $request->product_color_hin,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_description_en' => $request->short_description_en,
                'short_description_hin' => $request->short_description_hin,
                'long_description_en' => $request->long_description_en,
                'long_description_hin' => $request->long_description_hin,
                'status' => 1,
                'hot_deals' => $request->hot_deals,
                'special_offer' => $request->special_offer,
                'featured' => $request->featured,
                'special_deals' => $request->special_deals,
                'product_thumbnail' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Product::findorFail($product_id)->update([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'product_name_en' => $request->product_name_en,
                'product_name_hin' => $request->product_name_hin,
                'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
                'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'buying_price' => $request->buying_price,
                'product_tags_en' => $request->product_tags_en,
                'product_tags_hin' => $request->product_tags_hin,
                'product_size_en' => $request->product_size_en,
                'product_size_hin' => $request->product_size_hin,
                'product_color_en' => $request->product_color_en,
                'product_color_hin' => $request->product_color_hin,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_description_en' => $request->short_description_en,
                'short_description_hin' => $request->short_description_hin,
                'long_description_en' => $request->long_description_en,
                'long_description_hin' => $request->long_description_hin,
                'status' => 1,
                'hot_deals' => $request->hot_deals,
                'special_offer' => $request->special_offer,
                'featured' => $request->featured,
                'special_deals' => $request->special_deals,
                'updated_at' => Carbon::now(),
            ]);
        }




        $notification = array(
            'message' => 'Product updated successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('manage-product')->with($notification);
    }

    public function DeleteImage($id)
    {
        $pro_img = MultiImg::findOrFail($id);
        $img = $pro_img->photo_name;
        unlink($img);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function UploadMulImgs(Request $request)
    {
        $product_id = $request->product_id;

        // multiple image upload 
        $images = $request->file('photo_name');
        if ($request->file('photo_name')) {
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(917, 1000)->save('upload/products/multiimg/' . $make_name);
                $upload_path = 'upload/products/multiimg/' . $make_name;

                MultiImg::insert([
                    'product_id' => $product_id,
                    'photo_name' => $upload_path,
                    'created_at' => Carbon::now(),
                ]);
            }
        }

        $notification = array(
            'message' => 'Product Image Uploaded Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function ActivateProduct($id)
    {
        Product::findorFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Product Activated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function DeactivateProduct($id)
    {
        Product::findorFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Product Deactivated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $img = $product->product_thumbnail;
        unlink($img);

        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $image) {
            unlink($image->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }
        $notification = array(
            'message' => 'Product with its content deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductStock()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }
}
