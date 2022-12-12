<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPostCategory;
use App\Models\BlogPost;

class HomeBlogController extends Controller
{
    public function AllBlogPost()
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('frontend.blog.blog_list', compact('blogcategory', 'blogpost'));
    }

    public function BlogDetail($slug)
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::where('post_title_slug_en', $slug)->first();
        return view('frontend.blog.blog_detail', compact('blogcategory', 'blogpost'));
    }
}
