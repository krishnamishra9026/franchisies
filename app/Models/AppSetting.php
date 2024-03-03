<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'instagram_username',
        'youtube_api_key',
        'tiktok_license_key',
        'tiktok_username',
    ];

}
