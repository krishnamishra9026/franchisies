<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'footer_logo',
        'copyright_text',
        'facebook_link',
        'instagram_link',
        'youtube_link',
        'tiktok_link',
        'twitter_link',
    ];
}
