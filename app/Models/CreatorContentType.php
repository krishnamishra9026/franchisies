<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatorContentType extends Model
{
    use HasFactory;

     protected $fillable = [
        'content_type_id',
        'creator_id',
    ];


    public function content_type()
    {
       return $this->belongsTo(ContentType::class, 'content_type_id', 'id');
    }
}
