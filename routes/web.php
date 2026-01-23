<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\StarbucksStoreController;
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

// http://127.0.0.1:8000/search
Route::get('/search', [StarbucksStoreController::class, 'gestsearchMap'])->name('search.map');

// http://127.0.0.1/reviews
Route::get('/reviews', [ReviewsController::class, 'gestIndex'])->name('gest.reviews');

Route::post('reviews/{reviews}/like',[LikeController::class,'store'])->name('reviews.like');



// ログイン認証済
Route::middleware('auth')->group(function () {
    Route::get('/user_map', [StarbucksStoreController::class,'authMap'])->name('author.map');

    // http://127.0.0.1:8000/profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // http://127.0.0.1:8000/author-reviews
    // -------------投稿一覧表示(1週間以内をデォルトで表示)
    Route::get('/author-reviews', [ReviewsController::class, 'authorIndex'])->name('author.reviews');

    // http://127.0.0.1:8000/author-review-create
    Route::get('/author-review-create', [ReviewsController::class, 'create'])->name('review.create');
    Route::post('reviews/{review}/like',[LikeController::class,'store'])->name('reviews.like');

    // ------------口コミ投稿用
    Route::post('/author-review-create', [ReviewsController::class, 'store'])->name('review.store');

    // http://127.0.0.1:8000/author-myposts
    Route::get('/author-myposts', [ReviewsController::class, 'myReviews'])->name('author.myposts');


    // http://127.0.0.1:8000/author-review-edit
    Route::get('/author-myposts/{id}', [ReviewsController::class, 'edit'])->name('review.edit');

    Route::put('/author-review-edit/{id}', [ReviewsController::class, 'update'])->name('review.update');

    Route::delete('/author-myposts/{id}', [ReviewsController::class, 'destroy'])->name('mypost.delete');
});


//--------UI確認用ルート--------
//----edit画面確認用 http://127.0.0.1:8000/edit---
Route::view('/edit', 'edit');

// //---review画面確認用 http://127.0.0.1:8000/review?empty=1---
// Route::view('/review', 'reviews.index', [
//     'reviews' => collect(), // 空コレクション（$reviews->isEmpty() が使える）
// ]);
// //---ダミーデータ有りreview画面確認用 http://127.0.0.1:8000/review---
// Route::view('/review', 'reviews.index');
// use Illuminate\Support\Carbon;

// Route::get('/review', function () {
//     // 空表示も見たいとき: /review?empty=1
//     if (request('empty')) {
//         $reviews = collect();
//         return view('reviews.index', compact('reviews'));
//     }

//     $reviews = collect([
//         (object)[
//             'user_name'    => 'Megumi',
//             'status'       => 'available',
//             'product_name' => 'ほうじ茶フラペチーノ',
//             'comment'      => '甘さ控えめ。スッキリ飲めて最高！',
//             'created_at'   => now()->subMinutes(12),
//         ],
//         (object)[
//             'user_name'    => 'Saki',
//             'status'       => 'soldout',
//             'product_name' => '抹茶ラテ',
//             'comment'      => '夕方にはもう無かったです…',
//             'created_at'   => now()->subHours(2),
//         ],
//         (object)[
//             'user_name'    => 'Ken',
//             'status'       => 'available',
//             'product_name' => 'チョコスコーン',
//             'comment'      => 'レジ横にまだありました！',
//             'created_at'   => now()->subHours(5),
//         ],
//         (object)[
//             'user_name'    => 'Rina',
//             'status'       => 'soldout',
//             'product_name' => '季節限定ドーナツ',
//             'comment'      => '12時時点で売り切れでした。',
//             'created_at'   => now()->subDay(),
//         ],
//     ]);

//     return view('reviews.index', compact('reviews'));
// });

// // 履歴一覧（ダミー表示用）http://127.0.0.1:8000/history---
// Route::view('/history', 'histories.index');

// 履歴編集（UI確認用）http://127.0.0.1:8000/history-edit---
// Route::view('/history-edit', 'histories.edit');

// これは最後
require __DIR__ . '/auth.php';
