<?php

namespace App\Http\Controllers;

use App\Models\StarbucksStore;

class StarbucksStoreController extends Controller
{
    // ゲスト：Google上にピンを表示する
    public function guestMap()
    {
        $starbucksStores = StarbucksStore::all();

        return view('guest.map', compact('starbucksStores'));
    }

    public function guestSearchMap()
    {
        $starbucksStores = StarbucksStore::all();

        return view('guest.search', compact('starbucksStores'));
    }

    // ユーザー：Google上にピンを表示する
    public function authMap()
    {
        $starbucksStores = StarbucksStore::all();

        return view('author.map', compact('starbucksStores'));
    }

    public function authorSearchMap()
    {
        $starbucksStores = StarbucksStore::all();

        return view('author.search', compact('starbucksStores'));
    }
}
