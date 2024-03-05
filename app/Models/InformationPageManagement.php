<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InformationPageManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'editor',
        'meta_title',
        'meta_description',
        'status'
    ];
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }


     protected static function boot() {
        parent::boot();

        static::creating(function ($page) {

            if ($page->name) {
                $g_slug = Str::slug($page->name);
                $check_slug = InformationPageManagement::where('name', $page->name)->count();
                if ($check_slug > 0) {
                    $page->slug = Str::slug($page->name.'-'. ($check_slug));
                } else {
                    $page->slug = $g_slug;
                };
            }
        });

        static::updating(function ($page) 
        {
            $g_slug = Str::slug($page->name);
            $check_slug = InformationPageManagement::where('name', $page->name)->where('id', '!=', $page->id)->count();
            if ($check_slug > 0) {
                $page->slug = Str::slug($page->name.'-'. ($check_slug));
            } else {
                $page->slug = $g_slug;
            };
        });


    }

}
