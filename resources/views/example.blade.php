@extends('layouts.index')

@section('title', 'title | page')

@section('content')

    <div class="wrapper">
        <h1>ここに追加していく</h1>

        <p>・css・jsファイル作成：vite.config.jsに追記["resources/css/style.css"] <br>→npm run buildとnpm run devが必要かも</p>

        <p>・ルートの指定：routes/web.phpに <br>
            Route::get('/example', function () {return view('example');}); で表示できる<br>http://127.0.0.1/exampleでアクセス可能</p>
    </div>

@endsection
