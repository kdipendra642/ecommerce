<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;

class SubSubCategoryController extends Controller
{
    public function SubSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.subsubcategory.subsubcategory_view', compact('subsubcategories', 'categories'));
    }

    public function Create()
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view('backend.subsubcategory.create', compact('category', 'subcategory'));
    }

    public function SubSubCategoryAdd(Request $request)
    {
        $validatedData = $request->validate([
            'sub_sub_category_en' => 'required|max:250',
            'sub_sub_category_hin' => 'required|max:250',
        ]);


        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_en' => $request->sub_sub_category_en,
            'sub_sub_category_hin' => $request->sub_sub_category_hin,
            'sub_sub_category_slug_en' => strtolower(str_replace(' ', '-', $request->sub_sub_category_en)),
            'sub_sub_category_slug_hin' => str_replace(' ', '-', $request->sub_sub_category_hin),

        ]);
        $notification = array(
            'message' => 'SubSubCategory inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function EditSubSubCategory($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view('backend.subsubcategory.edit', compact('subcategory', 'category', 'subsubcategory'));
    }

    public function UpdateSubSubCategory(Request $request, $id)
    {
        $subsubcategory = $request->id;
        SubSubCategory::findOrFail($subsubcategory)->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_en' => $request->sub_sub_category_en,
            'sub_sub_category_hin' => $request->sub_sub_category_hin,
            'sub_sub_category_slug_en' => strtolower(str_replace(' ', '-', $request->sub_sub_category_en)),
            'sub_sub_category_slug_hin' => str_replace(' ', '-', $request->sub_sub_category_hin),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function DeleteSubSubCategory($id)
    {
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubSubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }



    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('sub_category_en', 'ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('sub_category_id', $subcategory_id)->orderBy('sub_sub_category_en', 'ASC')->get();
        return json_encode($subsubcat);
    }
}
