<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'product_name', 'slug', 'short_description', 'long_description', 'image', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
