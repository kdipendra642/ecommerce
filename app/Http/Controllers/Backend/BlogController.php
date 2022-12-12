<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPostCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Image;


class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blog_categories = BlogPostCategory::all();
        return view('backend.blogs.category.category_view', compact('blog_categories'));
    }

    public function BlogCategoryAdd(Request $request)
    {
        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_nep' => $request->blog_category_name_nep,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_nep' => strtolower(str_replace(' ', '-', $request->blog_category_name_nep)),
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Blog category inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function BlogCategoryUpdate(Request $request, $id)
    {
        BlogPostCategory::findOrFail($id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_nep' => $request->blog_category_name_nep,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_nep' => strtolower(str_replace(' ', '-', $request->blog_category_name_nep)),
        ]);

        $notification = array(
            'message' => 'Blog category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function BlogCategoryDelete($id)
    {
        BlogPostCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog category deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function AllBlogs()
    {
        $blogs = BlogPost::latest()->get();
        return view('backend.blogs.blogs.blogs_view', compact('blogs'));
    }

    public function AddBlogs()
    {
        $blog_categories = BlogPostCategory::all();
        return view('backend.blogs.blogs.blogs_create', compact('blog_categories'));
    }

    public function BlogCreate(Request $request)
    {
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;

        BlogPost::insert([
            'blog_category_id' => $request->blog_category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_nep' => $request->post_title_nep,
            'post_description_en' => $request->post_description_en,
            'post_description_hin' => $request->post_description_hin,
            'post_title_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
            'post_title_slug_hin' => strtolower(str_replace(' ', '-', $request->post_title_nep)),
            'post_image' => $save_url,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Blog inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog')->with($notification);
    }

    public function EditBlog($id)
    {
        $blogs = BlogPost::findorFail($id);
        $blog_categories = BlogPostCategory::all();
        return view('backend.blogs.blogs.blogs_edit', compact('blogs', 'blog_categories'));
    }

    public function BlogUpdate(Request $request, $id)
    {
        $old_img = $request->old_image;

        if ($request->file('post_image')) {
            unlink($old_img);
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;

            BlogPost::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'post_title_en' => $request->post_title_en,
                'post_title_nep' => $request->post_title_nep,
                'post_description_en' => $request->post_description_en,
                'post_description_hin' => $request->post_description_hin,
                'post_title_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
                'post_title_slug_hin' => strtolower(str_replace(' ', '-', $request->post_title_nep)),
                'post_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Blog Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.blog')->with($notification);
        } else {
            BlogPost::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'post_title_en' => $request->post_title_en,
                'post_title_nep' => $request->post_title_nep,
                'post_description_en' => $request->post_description_en,
                'post_description_hin' => $request->post_description_hin,
                'post_title_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
                'post_title_slug_hin' => strtolower(str_replace(' ', '-', $request->post_title_nep)),
            ]);

            $notification = array(
                'message' => 'Blog Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.blog')->with($notification);
        }
    }

    public function DeleteBlog($id)
    {
        $blog = BlogPost::findOrFail($id);
        $img = $blog->post_image;
        unlink($img);

        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog with its content deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
