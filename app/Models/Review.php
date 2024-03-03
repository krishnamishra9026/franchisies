<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

     protected $fillable = [
        'author',
        'user_type',
        'user_id',
        'sponsor_id',
        'subject',
        'review',
        'rating',
        'status',
    ];
}
