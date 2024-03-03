<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected static function boot() {
        parent::boot();

        static::creating(function ($category) {

            if ($category->name) {
                $g_slug = Str::slug($category->name);
                $check_slug = Category::where('name', $category->name)->count();
                if ($check_slug > 0) {
                    $category->slug = Str::slug($category->name.'-'. ($check_slug));
                } else {
                    $category->slug = $g_slug;
                };
            }
        });

        static::updating(function ($category) 
        {
            $g_slug = Str::slug($category->name);
            $check_slug = Category::where('name', $category->name)->where('id', '!=', $category->id)->count();
            if ($check_slug > 0) {
                $category->slug = Str::slug($category->name.'-'. ($check_slug));
            } else {
                $category->slug = $g_slug;
            };
        });

        static::updated(function ($category) {
        });

    }


    protected $fillable = [
        'name',
        'image',
        'h1_title',
        'h2_tag',
        'meta_title',
        'meta_description',
        'page_description',
    ];

    public function creator()
    {
        return $this->belongsToMany(Creator::class);
    }
}
