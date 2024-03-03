<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatorCreator extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'creator_id',
    ];

    public function creator()
    {
        return $this->belongsTo(Creator::class,'creator_id');
    }
}
