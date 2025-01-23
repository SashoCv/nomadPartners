<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'titleContact',
        'descriptionContact',
        'subtitleContact',
        'addressContact',
        'phoneContact',
        'emailContact',
        'workingHoursContact',
        'language_id',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'contact_id');
    }
}
