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
        'footer_description',
        'first_heading',
        'second_heading',
        'section_one_content',
        'section_one_image',
        'experience_heading',
        'experience_description',
        'experience_image',
        'testimonial_heading',
        'popular_heading',

    ];


    protected $table = 'setting';
}
