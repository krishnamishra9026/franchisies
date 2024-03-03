<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;


     protected $fillable = [
        'name',
        'description',
        'color',
        'price',
        'icon',
        'user_type',
        'status'
    ];
}
