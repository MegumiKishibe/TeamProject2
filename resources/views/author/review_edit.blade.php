@extends('layouts.index')

@section('title', 'author | 口コミを編集する')

@section('content')

    <p>Account:{{ sprintf('%04d', Auth::user()->id) }}</p>


    <h1>投稿を編集する</h1>

    <button><a href="{{ route('author.myposts') }}">口コミ一覧へ</a></button>
    @error('name')
        <div class="validate-wrapper">
            <div class="validate">
                <p>{{ $message }}</p>
            </div>
        </div>
    @enderror

    <form action="{{ route('review.update', ['id' => $review->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label>店舗名</label>
        <select name="starbucks_store_id">
            <option value="">選択してください</option>
            @foreach ($starbucksStores as $store)
                <option value="{{ $store->id }}" @if (old('starbucks_store_id', $review->starbucks_store_id) == $store->id) selected @endif>
                    {{ $store->name }}
                </option>
            @endforeach
        </select>
        <div>
            <label>商品名</label>
            <input type="text" name="product" value="{{ old('product', $review->product) }}">

        </div>

        <div>
            <label>販売状況</label>
            @foreach ($statuses as $status)
                <label>
                    <input type="radio" name="status_id" value="{{ $status->id }}"
                        @if (old('status_id', $review->status_id) == $status->id) checked @endif>
                    {{ $status->name }}
                </label>
            @endforeach
        </div>

        <div>
            <label>メッセージ</label>
            <br>
            <textarea name="message" cols="30" rows="10">{{ old('message', $review->message) }}</textarea>
        </div>

        <div>
            <button type="submit">Post</button>
        </div>
    </form>
@endsection
