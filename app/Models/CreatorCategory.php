<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatorCategory extends Model
{
    use HasFactory;

     protected $fillable = [
        'category_id',
        'creator_id',
    ];

    public function creators()
    {
      return $this->belongsToMany(Creator::class, 'creator_categories');
   }


   public function categories()
    {
      return $this->belongsToMany(Category::class, 'creator_categories');
   }

}
