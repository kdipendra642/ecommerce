<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;


class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_view', compact('subcategory', 'categories'));
    }

    public function Create()
    {
        $category = Category::all();
        return view('backend.subcategory.create', compact('category'));
    }

    public function SubCategoryAdd(Request $request)
    {
        $validatedData = $request->validate([
            'sub_category_en' => 'required|max:250',
            'sub_category_hin' => 'required|max:250',
        ]);


        SubCategory::insert([
            'category_id' => $request->category_id,
            'sub_category_en' => $request->sub_category_en,
            'sub_category_hin' => $request->sub_category_hin,
            'sub_category_en_slug' => strtolower(str_replace(' ', '-', $request->sub_category_en)),
            'sub_category_hin_slug' => str_replace(' ', '-', $request->sub_category_hin),

        ]);
        $notification = array(
            'message' => 'SubCategory inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function EditSubCategory($id)
    {

        $subcategory = SubCategory::findOrFail($id);
        $category = Category::all();
        return view('backend.subcategory.edit', compact('subcategory', 'category'));
    }

    public function UpdateSubCategory(Request $request, $id)
    {
        // dd('here');
        $subcategory = $request->id;
        SubCategory::findOrFail($subcategory)->update([
            'category_id' => $request->category_id,
            'sub_category_en' => $request->sub_category_en,
            'sub_category_hin' => $request->sub_category_hin,
            'sub_category_en_slug' => strtolower(str_replace(' ', '-', $request->sub_category_en)),
            'sub_category_hin_slug' => str_replace(' ', '-', $request->sub_category_hin),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function DeleteSubCategory($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
