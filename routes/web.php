<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\PopularWorkController;
use App\Http\Controllers\ExperienceController;

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('categories', CategoryController::class);
        Route::resource('blog-categories', BlogCategoryController::class);
        Route::delete('/blogs/bulk-delete', [BlogController::class, 'bulkDelete'])->name('blogs.bulkDelete');
        Route::delete('/testimonial/bulk-delete', [TestimonialsController::class, 'bulkDelete'])->name('testimonial.bulkDelete');
        Route::delete('/popular_work/bulk-delete', [PopularWorkController::class, 'bulkDelete'])->name('popular_work.bulkDelete');
        Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');
        Route::delete('/contacts/bulk-delete', [ContactController::class, 'bulkDelete'])->name('contacts.bulkDelete');
        Route::delete('/faqs/bulk-delete', [FaqController::class, 'bulkDelete'])->name('faqs.bulkDelete');
        Route::resource('blogs', BlogController::class);

        Route::resource('faqs', FaqController::class);
        Route::resource('setting', SettingController::class);
        Route::resource('contacts', ContactController::class);
        Route::resource('testimonial', TestimonialsController::class);
        Route::resource('popular_work', PopularWorkController::class);
        Route::resource('experience', ExperienceController::class);
        Route::resource('products', ProductController::class);
    });
});
require __DIR__ . '/auth.php';

Route::get('/{any}', function () {
    return view('frontend');
})->where('any', '.*');
