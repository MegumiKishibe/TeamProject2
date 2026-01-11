@extends('layouts.index')

@section('title', 'author | 自分の投稿履歴')

@section('content')
    <h1>投稿履歴</h1>

    <a href="{{ url()->previous() }}"><button>←戻る</button></a>

    <div class="wrapper">
        <form action="">
            <div>
                <button>削除する</button>
                <a href="{{ route('author.review_edit') }}"><button>編集する</button></a>

                <p>店舗名</p>
                <p>投稿者</p>
                <p>口コミ投稿日</p>
                <p>いいね</p>
                <p>商品名</p>
                <p>販売ステータス</p>
                <p>メッセージ</p>
            </div>
        </form>
    </div>





@endsection
