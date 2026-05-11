<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'city',
        'country',
        'address',
        'order',
        'language_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function teamMembers()
    {
        return $this->hasMany(TeamMembers::class, 'office_id')->orderBy('order', 'asc');
    }
}
