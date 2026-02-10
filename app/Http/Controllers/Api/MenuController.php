<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

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

        return response()->json($categories);
    }
}
