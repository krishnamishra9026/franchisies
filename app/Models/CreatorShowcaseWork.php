<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatorShowcaseWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'image_video',
    ];
}