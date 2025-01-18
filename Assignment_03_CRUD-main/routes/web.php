<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



// Default route for home
Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Product Management Routes
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create'); 
    Route::post('/', [ProductController::class, 'store'])->name('products.store'); 
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show'); 
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); 
    Route::put('/{id}', [ProductController::class, 'update'])->name('products.update'); 
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); 
});


require __DIR__.'/auth.php';
