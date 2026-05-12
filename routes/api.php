<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\HomeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/menu', [MenuController::class, 'getMenu']);
Route::get('/faq', [HomeController::class, 'faq']);

Route::post('/contact', [HomeController::class, 'storeContact']);

Route::get('/productDetails/{slug}', [HomeController::class, 'serviceDetails']);
Route::get('/blogDetails/{slug}', [HomeController::class, 'blogDetails']);

Route::get('/blogs/{slug}', [HomeController::class, 'blogByCategory']);
Route::get('/services/{slug}', [HomeController::class, 'services']);
Route::get('/categories', [HomeController::class, 'categories']);
Route::get('/blogcategories', [HomeController::class, 'blogCategories']);

Route::get('/testimonials', [HomeController::class, 'testimonials']);

Route::get('/popularWorks', [HomeController::class, 'popularWorks']);

Route::get('/settings', [MenuController::class, 'getSettings']);

Route::get('/experiences', [HomeController::class, 'experiences']);

Route::get('/searchData/{slug}', [HomeController::class, 'searchData']);

