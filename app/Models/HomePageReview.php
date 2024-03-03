<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageReview extends Model
{
    use HasFactory;
    protected $table = 'home_page_reviews';

    protected $fillable = [
        'title',
        'description',
        'image',
        'author_name',
        'designation',
    ];
}
