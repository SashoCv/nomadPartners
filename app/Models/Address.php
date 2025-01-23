<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'fullAddress',
    ];


    public function contactForm(): BelongsTo
    {
        return $this->belongsTo(ContactForm::class);
    }
}
