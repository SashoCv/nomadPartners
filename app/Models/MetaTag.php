<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'meta_title',
        'meta_description',
        'meta_cannonical_link',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function keywords()
    {
        return $this->hasMany(Keyword::class);
    }
}
