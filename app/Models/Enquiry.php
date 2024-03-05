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
      'state',
      'brand_name',
      'available_slot',
      'category',
      'city',
      'brandagreement',
      'form_type',
      'business_experience',
      'investment_range',
      'associate_time',
      'how_to_know_me',
      'status'
    ];
}
