<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\StarbucksStoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// ---------------通常ファイルです----------------------

// 未ログイン状態(ゲスト)
Route::get('/', function () {
    return view('auth.top');
});

// http://127.0.0.1/map
Route::get('/map', function () {
    return view('gest.map');
})->name('gest.map');

Route::get('/map', [StarbucksStoreController::class, 'gestMap'])->name('gest.map');

// http://127.0.0.1/reviews
Route::get('/reviews', [ReviewsController::class, 'gestIndex'])->name('gest.reviews');




// ログイン認証済
Route::middleware('auth')->group(function () {
    Route::get('/example', function () {
        return view('example');
    })->name('example');

    // http://127.0.0.1:8000/profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // http://127.0.0.1:8000/author-reviews
    // -------------投稿一覧表示(1週間以内)
    Route::get('/author-reviews', [ReviewsController::class, 'authorIndex'])->name('author.reviews');

    // http://127.0.0.1:8000/author-review-create
    Route::get('/author-review-create', [ReviewsController::class, 'create'])->name('review.create');

    // ------------口コミ投稿用
    Route::post('/author-review-create', [ReviewsController::class, 'store'])->name('review.store');

    // http://127.0.0.1:8000/author-myposts
    Route::get('/author-myposts', [ReviewsController::class, 'myReviews'])->name('author.myposts');


    // http://127.0.0.1:8000/author-review-edit
    Route::get('/author-myposts/{id}', [ReviewsController::class, 'edit'])->name('review.edit');

    Route::put('/author-review-edit/{id}', [ReviewsController::class, 'update'])->name('review.update');

    Route::delete('/author-myposts/{id}', [ReviewsController::class, 'destroy'])->name('mypost.delete');
});







// これは最後
require __DIR__ . '/auth.php';
