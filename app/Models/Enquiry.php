<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_type',
      'mobile',
      'name',
      'email',
      'query',
      'brand_name',
      'available_slot',
      'category',
      'city',
      'status'
   ];
}
