<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Popular_Work extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    protected $table = 'popular_works';
}
