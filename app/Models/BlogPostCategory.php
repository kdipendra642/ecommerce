<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_category_name_en',
        'blog_category_name_nep',
        'blog_category_slug_en',
        'blog_category_slug_nep',
    ];
}
