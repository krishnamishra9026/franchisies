<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'username',
        'phone_number',
        'alt_phone_number',
        'avatar',
        'address',
        'badge_ids',
        'address1',
        'city',
        'state',
        'zipcode',
        'country',
        'is_email_verified',
        'status',
        'facebook_id',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function creators()
    {
        return $this->hasMany(UserCreator::class,'user_id');
    }

    public function creator()
    {
        return $this->belongsTo(Creator::class,'creator_id');
    }

    public function stateData()
    {
        return $this->belongsTo(State::class, 'state', 'state');
    }

    public function countryData()
    {
        return $this->belongsTo(Country::class, 'country', 'country');
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'sponsor');
    }

    public function campaign()
    {
        return Campaign::where('sponsor', $this->id)->first();
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }


    public function campaignLast()
    {
        return Campaign::latest()->where('sponsor', $this->id)->first();
    }

}
