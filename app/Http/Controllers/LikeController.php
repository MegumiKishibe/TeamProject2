<?php

namespace App\Http\Controllers;

use App\Models\Review;

class LikeController extends Controller
{
    public function store($id)
    {
        $review = Review::findOrFail($id);
        $review->increment('likes_count');

        return back()->with('status', 'いいねしました！');
    }
}
