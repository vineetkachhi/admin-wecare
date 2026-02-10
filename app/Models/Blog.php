<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'long_description',
        'image',
        'status',
        'seo_title',
        'seo_description',
        'seo_meta_tag',
    ];
}
