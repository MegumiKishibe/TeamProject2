@extends('layouts.index')

@section('title', 'author | 自分の投稿履歴')

@section('content')
    <p>ログイン中のユーザー名：{{ Auth::user()->name }}</p>
    <p>Account:{{ sprintf('%04d', Auth::user()->id) }}</p>

    <h1>投稿履歴</h1>

    <a href="{{ url()->previous() }}"><button>←戻る</button></a>


    <form action="">
        @forelse ($reviews as $review)
            <div class="wrapper">
                <div>
                    <button style="">削除する</button>
                    <a href="{{ route('review.edit') }}"><button>編集する</button></a>
                </div>
                <nav>
                    <ul>
                        <li>{{ $review->starbucksStore->name }}</li>
                        <li>商品名：{{ $review->product }}</li>
                        {{-- <li>投稿者：{{ $review->user->name }}</li> --}}
                        <li>口コミ投稿日： {{ $review->created_at->format('Y/m/d H:i') }}</li>
                        <li>いいね：{{ $review->likes_count }} </li>
                        <li>販売状況：{{ $review->status->name }}</li>
                        <li>{{ $review->message }}</li>
                    </ul>
                </nav>
            </div>
        @empty
            <p>投稿はありません</p>
        @endforelse

    </form>

@endsection
