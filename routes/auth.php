<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Auth as FacadesAuth; // これが効いてるね！
use Illuminate\Support\Facades\Route;

// 1. ログインしてる人もしてない人も、まずここを通る設定
Route::get('/', function () {
    if (FacadesAuth::check()) {
        // ログイン済みなら検索画面へ！
        return redirect()->route('author.search');
    }
    // 未ログインならログイン画面へ！
    return redirect()->route('login');
});

// 2. 未ログイン状態(ゲスト)のみアクセス可能
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
});

// 3. ログイン認証済のみアクセス可能
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
