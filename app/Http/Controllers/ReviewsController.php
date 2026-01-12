<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\StarbucksStore;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ReviewsController extends Controller
{
    // ゲスト：口コミ一覧表示
    public function gestIndex(Request $request)
    {

        $storeId = $request->input('starbucks_store_id');
        $reviews = Review::where('starbucks_store_id', $storeId)
            ->where('created_at', '>=', Carbon::now()->subWeek())
            ->get();
        $starbucksStores = StarbucksStore::all();
        $statuses = Status::all();

        return view('gest.reviews', compact('reviews', 'statuses', 'starbucksStores'));
    }

    // ユーザー画面：口コミ一覧表示
    public function authorIndex(Request $request)
    {
        $user = auth()->user();

        $storeId = $request->input('starbucks_store_id');
        $reviews = Review::where('starbucks_store_id', $storeId)
            ->where('created_at', '>=', Carbon::now()->subWeek())
            ->get();

        $statuses = Status::all();
        $starbucksStore = StarbucksStore::find($storeId);

        return view('author.reviews', compact('reviews', 'statuses', 'starbucksStore'));
    }
    // ユーザー画面：自分の投稿履歴一覧
    public function myReviews(Request $request)
    {

        $reviews = Review::with('status')
            ->where('user_id', FacadesAuth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $storeId = $request->input('starbucks_store_id');
        $starbucksStore = StarbucksStore::find($storeId);
        $starbucksStores = StarbucksStore::all();
        $statuses = Status::all();

        return view('author.myposts', compact('reviews', 'starbucksStores', 'starbucksStore', 'statuses'));
    }

    // ユーザー画面：投稿作成ページを表示する
    public function create(Request $request)
    {
        $storeId = request('starbucks_store_id');
        $starbucksStore = StarbucksStore::find($storeId);
        return view(
            'author.review_create',
            [
                'statuses' => Status::all(),
                'starbucksStore' => $starbucksStore,
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
            'starbucks_store_id' => $validated['starbucks_store_id'],
            'product' => $validated['product'],
            'message' => $validated['message'],
        ]);

        return redirect()->route('author.reviews', [
            'starbucks_store_id' => $validated['starbucks_store_id']
        ])->with('status', '投稿しました');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $review = Review::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $starbucksStores = StarbucksStore::all();
        $statuses = Status::all();

        return view('author.review_edit', compact('review', 'starbucksStores', 'statuses'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product' => ['required', 'string', 'max:30'],
            'status_id' => ['required', 'exists:statuses,id'],
            'starbucks_store_id' => ['nullable', 'exists:starbucks_stores,id'],
            'message' => ['required', 'string'],
        ]);
        $review = Review::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();


        $review->update([
            'user_id' => auth()->id(),
            'status_id' => $validated['status_id'],
            'starbucks_store_id' => $validated['starbucks_store_id'] ?? null,
            'product' => $validated['product'],
            'message' => $validated['message'],
        ]);

        return redirect()->route('author.myposts')->with('status', '投稿を変更しました');
    }

    //  ユーザー画面：自分の投稿履歴一覧からのみ削除可能
    public function destroy(string $id)
    {
        $review = Review::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $review->delete();
        return redirect()->route('author.myposts')->with('status', "投稿を削除しました");
    }
}
