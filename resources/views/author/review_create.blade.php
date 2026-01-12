@extends('layouts.index')

@section('title', 'author | 口コミを投稿する')

@section('content')

    <p>Account:{{ sprintf('%04d', Auth::user()->id) }}</p>


    <h1>投稿する</h1>

    <a href="{{ route('author.reviews') }}"><button>口コミ一覧へ</button></a>

    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        <label>店舗名</label>
        <h1>{{ $starbucksStore->name }}</h1>
        @if (isset($starbucksStore))
            <input type="hidden" name="starbucks_store_id" value="{{ $starbucksStore->id }}">
        @endif
        <div>
            <label>商品名</label>
            <input type="text" name="product" value="{{ old('product') }}">
        </div>

        <div>
            <label>販売状況</label>
            @foreach ($statuses as $status)
                <label>
                    <input type="radio" name="status_id" value="{{ $status->id }}"
                        @if (old('status_id') == $status->id) checked @endif>
                    {{ $status->name }}
                </label>
            @endforeach
        </div>

        <div>
            <label>メッセージ</label>
            <br>
            <textarea name="message" cols="30" rows="10">{{ old('message') }}</textarea>
        </div>

        <div>
            <button type="submit">Post</button>
        </div>
    </form>



@endsection
