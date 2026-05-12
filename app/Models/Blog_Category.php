<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog_Category extends Model
{
    protected $fillable = [
        'category_name',
        'slug',
        'status',
    ];

    protected $table = 'blog_categories';

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
