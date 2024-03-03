<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;


    protected static function boot() {
        parent::boot();

        static::creating(function ($brand) {

            if ($brand->brandname) {
                $g_slug = Str::slug($brand->brandname);
                $check_slug = Brand::where('brandname', $brand->brandname)->count();
                if ($check_slug > 0) {
                    $brand->slug = Str::slug($brand->brandname.'-'. ($check_slug));
                } else {
                    $brand->slug = $g_slug;
                };
            }
        });

        static::updating(function ($brand) 
        {
            $g_slug = Str::slug($brand->brandname);
            $check_slug = Brand::where('brandname', $brand->brandname)->where('id', '!=', $brand->id)->count();
            if ($check_slug > 0) {
                $brand->slug = Str::slug($brand->brandname.'-'. ($check_slug));
            } else {
                $brand->slug = $g_slug;
            };
        });

        static::updated(function ($brand) {
        });

    }


    protected $fillable = [
        'email',
        'password',
        'category',
        'brandname',
        'slug',
        'brandurl',
        'brandtype',
        'established',
        'bdescr',
        'brandstarted',
        'investment',
        'space_req',
        'boutlats',
        'prange',
        'memberofbrand',
        'brandnumber',
        'state',
        'singleunit',
        'brandfee',
        'equipments',
        'furniture',
        'advertising',
        'paybackp',
        'anyotherinvi',
        'lookexpansion',
        'returnoninv',
        'reqproperty',
        'floorarea',
        'locationbrand',
        'officestaff',
        'comsyatem',
        'internetreq',
        'fieldassis',
        'trainingprogm',
        'opermanual',
        'needit',
        'headofficeassis',
        'website',
        'brandterm',
        'proirity',
        'brandagreement',
        'busiopertunity',
        'whatsnew',
        'brandopon',
        'brandhomepage',
        'toplogo',
        'popubrand',
        'ispremium',
        'isnewarrival',
        'ispremiumtop',
        'masterbrand',
        'verifybrand',
        'busioverview',
        'video_url',
        'logo',
        'banner',
        'tbanner',
        'tbanner1',
        'tbanner2',
        'tbanner3',
        'tbanner4',
        'tbanner5',
        'ppt',
        'priorityhome',
        'prioritycat',
        'status'
    ];

    public function categoryData(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }
    
}
