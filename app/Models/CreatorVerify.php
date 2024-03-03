<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CreatorVerify extends Model
{
   use HasFactory;

   public $table = "creator_verifies";
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'creator_id',
        'token',
    ];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function user()
    {
        return $this->belongsTo(Creator::class,'creator_id');
    }
}
