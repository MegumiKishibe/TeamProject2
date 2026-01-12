<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\StarbucksStore;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class ReviewsController extends Controller
{

    public function gestIndex()
    {
        $reviews = Review::with('status')
            ->where('created_at', '>=', Carbon::now()->subWeek())
            ->get();

        return view('author.reviews', compact('reviews', 'statuses', 'starbucksStores'));
    }

    // ユーザー画面：口コミ一覧表示
    public function authorIndex()
    {
        $user = auth()->user();

        $statuses = Status::all();
        $starbucksStores = StarbucksStore::all();


        $reviews = Review::with('status')
            ->where('created_at', '>=', Carbon::now()->subWeek())
            ->get();

        return view('author.reviews', compact('reviews', 'statuses', 'starbucksStores'));
    }
    // ユーザー画面：自分の投稿履歴一覧
    public function myReviews()
    {

        $reviews = Review::with('status')
            ->where('user_id', FacadesAuth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('author.myposts', compact('reviews'));
    }

    // ユーザー画面：投稿作成ページを表示する
    public function create()
    {
        return view(
            'author.review_create',
            [
                'statuses' => Status::all(),
                'starbucksStores' => StarbucksStore::all()
            ]
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product' => ['required', 'string', 'max:30'],
            'status_id' => ['required', 'exists:statuses,id'],
            'starbucks_store_id' => ['nullable', 'exists:starbucks_stores,id'],
            'message' => ['required', 'string'],
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'status_id' => $validated['status_id'],
            'starbucks_store_id' => $validated['starbucks_store_id'] ?? null,
            'product' => $validated['product'],
            'message' => $validated['message'],
        ]);

        return redirect()->route('author.reviews')->with('status', '投稿しました');
    }

    public function show(string $id)
    {
        //
    }

    // user_id
    // starbucks_store_id'
    // 'status_id
    // product
    // message'

    public function edit(string $id)
    {
        return view(
            'author.review_edit',
            [
                'statuses' => Status::all(),
                'starbucksStores' => StarbucksStore::all()
            ]
        );
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
