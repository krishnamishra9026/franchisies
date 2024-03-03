<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sort_order',
        'category',
        'image',
    ];

    public function categoryData()
    {
        return $this->belongsTo('App\Models\Category', 'category', 'id');
    }

}
