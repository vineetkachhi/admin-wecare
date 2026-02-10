<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected  $fillable = [
        'logo',
        'favicon',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'footer_heading',
        'footer_description'
    ];


    protected $table = 'setting';
}
