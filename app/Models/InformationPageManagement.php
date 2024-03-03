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

}
