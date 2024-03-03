<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'sponsor',
        'title',
        'description',
        'category',
        'price',
        'status',
        'clicks',
        'image'
    ];

    public function sponsorData()
    {
        return $this->belongsTo('App\Models\User', 'sponsor', 'id');
    }

    public function categoryData()
    {
        return $this->belongsTo('App\Models\Category', 'category', 'id');
    }

    public function contentTypeData()
    {
        return $this->belongsTo('App\Models\ContentType', 'content_type', 'id');
    }


    public function content_types()
    {
        return $this->hasMany(CampaignContentType::class,'campaign_id');
    }


    public function categories()
    {
        return $this->hasMany(CampaignCategory::class,'campaign_id');
    }

}
