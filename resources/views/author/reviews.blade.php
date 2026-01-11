@extends('layouts.index')

@section('title', 'author | 口コミみる')

@section('content')


    <h1>データベース確認</h1>

    <div>Userテーブル</div>
    {{-- @foreach ($users as $user)
        <input value="{{ $user->id }}" disabled></input>
        <input value="{{ $user->name }}" disabled></input>
        <input value="{{ $user->email }}" disabled></input>
    @endforeach --}}

    <div>Statusテーブル</div>
    {{-- @foreach ($statuses as $status)
        <input value="{{ $statu->name }}">
    @endforeach --}}

    <div>StarbucksStoreテーブル</div>

    {{-- @foreach ($starbucksStores as $starbucksStore)
        <nav>
            <ul>
                <li>{{ $starbucksStore->name }}</li>
                <li>{{ $starbucksStore->address }}</li>
            </ul>
        </nav>
    @endforeach --}}

    <h1>口コミ一覧</h1>
    <p>店舗名</p>
    <p>投稿者</p>
    <p>口コミ投稿日</p>
    <p>いいね</p>
    <p>商品名</p>
    <p>販売ステータス</p>
    <p>メッセージ</p>

    <a href="{{ route('author.review_create') }}"><button>投稿する</button></a>


    <a href="{{ route('example')}}">
        <button>戻る</button></a>

@endsection
