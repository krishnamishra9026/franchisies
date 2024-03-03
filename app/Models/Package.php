<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_type',
        'monthly_price',
        'quarterly_price',
        'half_yearly_price',
        'yearly_price',
        'description',
        'status'
    ];
}
