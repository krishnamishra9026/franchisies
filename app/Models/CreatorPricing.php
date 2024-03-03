<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatorPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'service_detail',
        'delivery_time',
        'social_platform',
        'price',
    ];
}
