<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StarbucksStoreController;
use App\Http\Controllers\UserController;
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
    return view('gest.reviews');
})->name('gest.reviews');


// ログイン認証済
Route::middleware('auth')->group(function () {
    Route::get('/example', function () {
        return view('example');
    })->name('example');

    // http://127.0.0.1:8000/profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/author-reviews', function () {
    return view('author.reviews');
})->name('author.reviews');


// データベース確認用
// Route::get('/author-reviews', [UserController::class, 'index'])->name('user');
// Route::get('/author-reviews', [StarbucksStoreController::class, 'index'])->name('statbucksStore');

require __DIR__ . '/auth.php';
