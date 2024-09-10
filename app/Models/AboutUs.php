<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'titleHeroAboutUs',
        'subtitleHeroAboutUs',
    ];

    public function boxAboutUs()
    {
        return $this->hasMany(BoxAboutUs::class);
    }
}
