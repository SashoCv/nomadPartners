<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titleOfBlog',
        'contentOfBlog',
        'blog_category_id',
        'pictureOfBlog',
        'pictureOfBlogPath'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
