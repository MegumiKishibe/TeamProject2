<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// ---------------通常ファイルです----------------------

// 未ログイン状態(ゲスト)
// http://127.0.0.1/
Route::get('/', function () {
    return view('welcome');
})->name('/');


// http://127.0.0.1/map
Route::get('/map', function () {
    return view('gest.map');
})->name('gest.map');


// http://127.0.0.1/reviews
Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');


// ログイン認証済
Route::middleware('auth')->group(function () {
    Route::get('/example', function () {
        return view('example');
    })->name('example');

    // http://127.0.0.1:8000/profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
