<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\FrontendController;


use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





    // Category Management
    Route::resource('categories', CategoryController::class);

    // Product Management
    Route::resource('products', ProductController::class);

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::get('/frontend', [FrontendController::class, 'index'])->name('frontend.index');


require __DIR__.'/auth.php';
