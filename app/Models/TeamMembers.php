<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'position',
        'description',
        'imageName',
        'imagePath',
        'order',
        'language_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
