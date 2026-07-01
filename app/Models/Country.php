<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'iso_code',
        'name',
        'title',
        'short_description',
        'content',
        'sectors',
        'languages',
        'permit_time',
        'imagePath',
        'imageName',
        'order',
        'language_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
