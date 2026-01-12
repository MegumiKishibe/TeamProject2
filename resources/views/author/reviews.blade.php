@extends('layouts.index')

@section('title', 'author | 口コミみる')

@section('content')
    <p>ログイン中のユーザー名：{{ Auth::user()->name }}</p>
    <p>Account:{{ sprintf('%04d', Auth::user()->id) }}</p>

    <div class="validate-wrapper">
        @if (session('status'))
            <div class="validate">
                <p>{{ session('status') }}</p>
            </div>
        @endif
    </div>

    <h1>口コミ一覧</h1>
    @foreach ($reviews as $review)
        <div class="wrapper">
            <nav>
                <ul>
                    <li>{{ $review->starbucksStore->name }}</li>
                    <li>商品名：{{ $review->product }}</li>
                    <li>投稿者：{{ $review->user->name }}</li>
                    <li>口コミ投稿日： {{ $review->created_at->format('Y/m/d H:i') }}</li>
                    <li>いいね：{{ $review->likes_count }}
                        <button>いいねする</button>
                    </li>
                    <li>販売状況：{{ $review->status->name }}</li>
                    <li>{{ $review->message }}</li>
                </ul>
            </nav>
        </div>
    @endforeach

    <a href="{{ route('review.create') }}"><button>投稿する</button></a>


    <a href="{{ route('example') }}">
        <button>戻る</button></a>

@endsection
