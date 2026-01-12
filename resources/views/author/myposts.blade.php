@extends('layouts.index')

@section('title', 'author | 自分の投稿履歴')

@section('content')
    <p>ログイン中のユーザー名：{{ Auth::user()->name }}</p>
    <p>Account:{{ sprintf('%04d', Auth::user()->id) }}</p>

    <h1>投稿履歴</h1>

    <a href="{{ route('example') }}"><button>←戻る</button></a>

    <div class="validate-wrapper">
        @if (session('status'))
            <div class="validate">
                <p>{{ session('status') }}</p>
            </div>
        @endif
    </div>



    @forelse ($reviews as $review)
        <div class="wrapper">
            <div>
                <form action="{{ route('mypost.delete', ['id' => $review->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('本当に削除しますか？')">削除する</button>
                </form>

                <a href="{{ route('review.edit', ['id' => $review->id]) }}"><button>編集する</button></a>
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



@endsection
