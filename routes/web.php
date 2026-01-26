<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'] )->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products/{category}', [ProductsController::class, 'getSectionProducts'])->name('products.list');
Route::get('/product/show/{product}', [ProductsController::class, 'showProduct'])->name('product.show');
Route::get('/jobs/show/{job}', [JobsController::class, 'showJob'])->name('job.show');
Route::get('/all_products', [ProductsController::class, 'showAll'])->name('all_products.show');
Route::get('/all_products', [ProductsController::class, 'showAll'])->name('all_products.show');
Route::get('/tester', [MainController::class, 'tester']);
Route::post('/message/add', [MainController::class, 'addMessage'])->name('message.add');
Route::get('/vr/{image}', [ProductsController::class, 'vr'])->name('vr.show');


require __DIR__.'/auth.php';
