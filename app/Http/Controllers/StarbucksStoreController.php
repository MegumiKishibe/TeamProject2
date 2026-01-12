<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\StarbucksStore;
use Illuminate\Http\Request;

class StarbucksStoreController extends Controller
{

    // ゲスト：Google上にピンを表示する
    public function gestMap()
    {
        $starbucksStores = StarbucksStore::all();
        return view('gest.map', compact('starbucksStores'));
    }

    // 詳細ポップアップのリンクから店舗ごとの口コミを開く
    public function gestIndex()
    {
        $storeId = $request->input('starbucks_store_id'); // ボタンから渡されたID
        $starbucksStores = StarbucksStore::all();

        $reviewsQuery = Review::with('starbucksStore', 'status', 'user');

        if ($storeId) {
            $reviewsQuery->where('starbucks_store_id', $storeId);
        }

        $reviews = $reviewsQuery->get();
        return view('author.reviews', compact('starbucksStores', 'reviews', 'storeId'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }
}
