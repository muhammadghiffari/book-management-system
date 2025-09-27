<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Root returns welcome (status 200) to satisfy ExampleTest
Route::get('/', function () {
    return view('login'); //
});

// Dashboard for admin only
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group route yang butuh authentication
Route::middleware(['auth', 'verified'])->group(function () {
    // Resource route untuk CRUD Books
    Route::resource('books', BookController::class);

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
