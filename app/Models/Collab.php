<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collab extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'creator',
        'impression',
        'status',
        'clicks',
        'description',
        'content_type',
        'category',
        'tag'
    ];


    public function Category()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function ContentType()
    {
        return $this->belongsTo(ContentType::class, 'content_type', 'id');
    }

    public function Tag()
    {
        return $this->belongsTo(Tag::class, 'tag', 'id');
    }
}
