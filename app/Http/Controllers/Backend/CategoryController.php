<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));
    }

    public function Create()
    {
        return view('backend.category.create');
    }

    public function CategoryAdd(Request $request)
    {
        $validatedData = $request->validate([
            'category_name_en' => 'required|max:250',
            'category_name_hin' => 'required|max:250',
        ]);


        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon,

        ]);
        $notification = array(
            'message' => 'Category inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function EditCategory($id)
    {
        $category = Category::find($id);

        return view('backend.category.edit', compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        $category_id = $request->id;
        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);
    }


    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
