<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'titleOfBlog',
        'contentOfBlog',
        'blog_category_id',
        'pictureOfBlog',
        'pictureOfBlogPath'
    ];
}
