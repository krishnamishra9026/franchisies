<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'user_type',
        'badges',
        'amount',
        'status',
        'transaction_id',
    ];

    public function packageData()
    {
        return $this->belongsTo('App\Models\Package', 'package', 'id');
    }

    public function badgesData()
    {
        return Badge::whereIn('id', json_decode($this->badges))->pluck('name');
    }
}
