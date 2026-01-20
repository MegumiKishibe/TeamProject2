<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Review $review)
    {
        $review->increment('likes_count');
        return back();
    }
}
