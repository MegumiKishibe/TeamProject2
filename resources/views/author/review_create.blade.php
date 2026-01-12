@extends('layouts.index')

@section('title', 'author | 口コミを投稿する')

@section('content')

    <p>Account:{{ sprintf('%04d', Auth::user()->id) }}</p>


    <h1>投稿する</h1>

    <a href="{{ route('author.reviews') }}"><button>口コミ一覧へ</button></a>

    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        {{-- #TODO:店名はAPIでスターバックス店舗テーブルから持ってきたデータに変更する --}}

        <label>店舗名</label>
        {{-- #TODO:一旦店舗選択にしているが、のちのち選択選択する --}}
        <select name="starbucks_store_id">
            <option value="">選択してください</option>
            @foreach ($starbucksStores as $store)
                <option value="{{ $store->id }}" @if (old('starbucks_store_id') == $store->id) selected @endif>
                    {{ $store->name }}
                </option>
            @endforeach
        </select>
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
