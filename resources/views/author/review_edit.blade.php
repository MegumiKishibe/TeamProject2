@extends('layouts.index')

@section('title', 'author | 口コミを編集する')

@section('content')


    <p>Account:{{ sprintf('%04d', Auth::user()->id) }}</p>
    <p>なんばスカイオ店</p>

    <h1>投稿を編集する</h1>

    <button><a href="{{ route('author.reviews') }}">口コミ一覧へ</a></button>

    <form action="" method="POST">
        <div>
            <label for="">商品名
                <input type="text">
            </label>
        </div>

        <div>
            <label for="">販売状況</label>
            <label>
                <input type="radio" name="status" value="まだある" checked>
                まだある
            </label>
            <label>
                <input type="radio" name="status" value="もうない">
                もうない
            </label>

        </div>

        <div>
            <label for="">商品名
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </label>
        </div>

        <div>
            <button type="submit">Post</button>
        </div>
    </form>



@endsection
