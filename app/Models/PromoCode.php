<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'valid_from_date',
        'valid_to_date',
        'no_of_uses',
        'status',
        'type',
        'used',
        'value'
    ];
}
