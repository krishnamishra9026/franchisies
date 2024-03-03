<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignContentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_type_id',
        'campaign_id',
    ];

    public function content_type()
    {
       return $this->belongsTo(ContentType::class, 'content_type_id', 'id');
    }
}
