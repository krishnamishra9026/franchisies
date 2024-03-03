<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatorClientLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'creator_id',
    ];
}
