<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_title',
        'meta_description',
        'seo_content',
        'page_title',
        'works_title1',
        'works_description1',
        'works_image1',
        'works_title2',
        'works_description2',
        'works_image2',
        'works_title3',
        'works_description3',
        'works_image3',
        'works_title4',
        'works_description4',
        'works_image4',
        'banner1_title',
        'banner1_button_text',
        'banner1_button_bg_color',
        'banner1_button_text_color',
        'banner1_image',
        'banner2_title',
        'banner2_description',
        'banner2_button_text',
        'banner2_button_bg_color',
        'banner2_button_text_color',
        'banner2_image',
        'title1',
        'description1',
        'image',
        'title2',
        'description2',
        'title3',
        'description3',
        'title4',
        'description4',
        'banner_title',
        'search_placeholder',
        'search_button_background',
        'background_image',
        'mobile_background_image',
    ];
}
