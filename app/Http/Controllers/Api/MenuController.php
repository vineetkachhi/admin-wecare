<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog_Category;
use App\Models\Setting;

class MenuController extends Controller
{
    public function getMenu()
    {
        $menu = Category::with('products')->where('status', 'active')->get();

        $categories = [];
        foreach ($menu as $item) {
            $categories[] = [
                'name' => $item->category_name,
                'id' => $item->id,
                'slug' => $item->slug,

                'products' => $item->products->map(function ($product) {
                    return [
                        'name' => $product->product_name,
                        'id' => $product->id,
                        'slug' => $product->slug,
                    ];
                }),
            ];
        }
        $blogs = Blog_Category::where('status', 'active')->get();
        $blog_categories = [];
        foreach ($blogs as $blog) {
            $blog_categories[] = [
                'name' => $blog->category_name,
                'id' => $blog->id,
                'slug' => $blog->slug,
            ];
        }
        return response()->json([
            'categories' => $categories,
            'blog_categories' => $blog_categories
        ], 200);
    }

    public function getSettings()
    {
        $settings = Setting::first();

        $settings = [
            'site_logo' => $settings->logo,
            'site_favicon' => $settings->favicon,
            'contact_email' => $settings->email,
            'contact_phone' => $settings->phone,
            'address' => $settings->address,
            'facebook_link' => $settings->facebook,
            'twitter_link' => $settings->twitter,
            'instagram_link' => $settings->instagram,
            'linkedin_link' => $settings->linkedin,
            'footer_heading' => $settings->footer_heading,
            'footer_description' => $settings->footer_description,
            'first_heading' => $settings->first_heading,
            'second_heading' => $settings->second_heading,
            'section_one_content' => $settings->section_one_content,
            'section_one_image' => $settings->section_one_image,
            'experience_heading' => $settings->experience_heading,
            'experience_description' => $settings->experience_description,
            'experience_image' => $settings->experience_image,
            'testimonial_heading' => $settings->testimonial_heading,
            'popular_heading' => $settings->popular_heading,

        ];
        return response()->json($settings, 200);
    }
}
