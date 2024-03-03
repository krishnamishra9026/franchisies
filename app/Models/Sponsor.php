<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'phone_number',
        'alt_phone_number',
        'avatar',
        'address',
        'address1',
        'city',
        'state',
        'zipcode',
        'country',
        'status',
    ];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'sponsor');
    }

    public function stateData()
    {
        return $this->belongsTo(State::class, 'state', 'state');
    }

    public function countryData()
    {
        return $this->belongsTo(Country::class, 'country', 'country');
    }
}
