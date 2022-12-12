<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'sub_sub_category_en',
        'sub_sub_category_hin',
        'sub_sub_category_slug_en',
        'sub_sub_category_slug_hin',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
}
