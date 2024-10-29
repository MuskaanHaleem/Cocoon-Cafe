<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/home', function () {
    return view('home'); // Make sure you have a 'home.blade.php' view file
})->name('home');
Route::get('/menu', function () {
    return view('menu'); // Make sure you have a 'home.blade.php' view file
})->name('menu');
Route::get('/contact', function () {
    return view('contact'); // Make sure you have a 'home.blade.php' view file
})->name('contact');


require __DIR__.'/auth.php';
