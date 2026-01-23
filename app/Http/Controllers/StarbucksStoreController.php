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

    public function gestsearchMap()
    {
        $starbucksStores = StarbucksStore::all();
        return view('gest.search', compact('starbucksStores'));
    }
    // ユーザー：Google上にピンを表示する
    public function authMap()
    {
        $starbucksStores = StarbucksStore::all();
        return view('author.map', compact('starbucksStores'));
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
