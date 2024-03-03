<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use App\Notifications\Creator\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Creator extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected static function boot() {
        parent::boot();

        static::creating(function ($creator) {

            if ($creator->lastname && $creator->state && $creator->country) {
                $g_slug = Str::slug($creator->firstname.' '.$creator->lastname.' '.$creator->state.' '.$creator->country);
                $check_slug = Creator::where('firstname', $creator->firstname)->where('lastname', $creator->lastname)->count();
                if ($check_slug > 0) {
                    $creator->slug = Str::slug($creator->firstname.' '.$creator->lastname. ('0'.($check_slug)).' '.$creator->state.' '.$creator->country);
                } else {
                    $creator->slug = $g_slug;
                };
            }
        });

        static::updating(function ($creator) 
        {
            $g_slug = Str::slug($creator->firstname.' '.$creator->lastname.' '.$creator->state.' '.$creator->country);
            $check_slug = Creator::where('firstname', $creator->firstname)->where('lastname', $creator->lastname)->where('id', '!=', $creator->id)->count();
            if ($check_slug > 0) {
                $creator->slug = Str::slug($creator->firstname.' '.$creator->lastname. ('0'.($check_slug)).' '.$creator->state.' '.$creator->country);
            } else {
                $creator->slug = $g_slug;
            };
        });

        static::updated(function ($creator) {
        });

    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uid',
        'phyllo_user_id',
        'phyllo_token',
        'instagram_connected',
        'youtube_connected',
        'tiktok_connected',
        'firstname',
        'lastname',
        'featured',
        'username',
        'email',
        'slug',
        'email_verified_at',
        'phone',
        'password',
        'avatar',
        'gender',
        'bio',
        'address',
        'badge_ids',
        'address1',
        'city',
        'state',
        'alt_phone_number',
        'zipcode',
        'country',
        'instagram',
        'youtube',
        'avg_rating',
        'tiktok',
        'instagram_subscribers_or_followers',
        'youtube_subscribers_or_followers',
        'tiktok_subscribers_or_followers',
        'status',
        'talent_title',
        'talent_description',
        'showcase_example',
        'is_email_verified',
        'price',
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }


    public function services()
    {
        return $this->hasMany(Campaign::class, 'sponsor');
    }


    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id', 'id')->where('status', 1);
    }


    public function showCaseData()
    {
        return $this->hasMany(CreatorShowcaseWork::class, 'creator_id', 'id');
    }


    public function pricingData()
    {
        return $this->hasMany(CreatorPricing::class, 'creator_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function contentTypeData()
    {
        return $this->belongsTo(ContentType::class, 'content_type');
    }


    public function stateData()
    {
        return $this->belongsTo(State::class, 'state', 'state');
    }

    public function countryData()
    {
        return $this->belongsTo(Country::class, 'country', 'country');
    }

    public function categoryData()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function categoriesData()
    {
        return $this->belongsToMany(Category::class, 'creator_categories');
    }

    public function TagData()
    {
        return $this->belongsTo(Tag::class, 'tag');
    }

    public function content_types()
    {
        return $this->hasMany(CreatorContentType::class,'creator_id');
    }


    public function pricing_datas()
    {
        return $this->hasMany(CreatorPricing::class,'creator_id');
    }

    public function categories()
    {
        return $this->hasMany(CreatorCategory::class,'creator_id');
    }

    public function creators()
    {
        return $this->hasMany(CreatorCreator::class,'user_id');
    }

    public function tags()
    {
        return $this->hasMany(CreatorTag::class,'creator_id');
    }

    public function minPrice()
    {
        return $this->pricingData()[0]->price;
    }

}