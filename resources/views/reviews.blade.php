@extends('layouts.index')

@section('title', 'gest | 口コミみる')

@section('content')
    <h1>口コミ一覧</h1>

    <p>店舗名</p>
    <p>投稿者</p>
    <p>口コミ投稿日</p>
    <p>いいね</p>
    <p>商品名</p>
    <p>販売ステータス</p>
    <p>メッセージ</p>

    <a href="{{ redirect()->back()->getTargetUrl() }}"><button>戻る</button></a>

@endsection
