<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatorTag extends Model
{
    use HasFactory;

     protected $fillable = [
        'tag_id',
        'creator_id',
    ];

     public function tag()
    {
       return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}
