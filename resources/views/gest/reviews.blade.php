@extends('layouts.index')

@section('title', 'gest | 口コミみる')

@section('content')


    <h1>口コミ一覧</h1>

    @forelse($reviews as $review)
        <h1>{{ $review->starbucksStore->name }}</h1>
        <div class="wrapper">
            <nav>
                <ul>

                    <li>商品名：{{ $review->product }}</li>
                    <li>投稿者：{{ $review->user->name }}</li>
                    <li>口コミ投稿日： {{ $review->created_at->format('Y/m/d H:i') }}</li>
                    <li>いいね：{{ $review->likes_count }}
                        <form action="{{ route('reviews.like', $review) }}" method="POST">
                            @csrf
                            <button type="submit">いいねする</button>
                        </form>

                    </li>
                    <li>販売状況：{{ $review->status->name }}</li>
                    <li>{{ $review->message }}</li>
                </ul>
            </nav>
        </div>
    @empty
        <p>この店舗の1週間以内のレビューはありません。</p>
    @endforelse

    <a href="{{ route('gest.map') }}"><button>戻る</button></a>

@endsection
