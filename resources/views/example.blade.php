{{--  http://127.0.0.1:8000/example --}}

@extends('layouts.index')

@section('title', 'title | page')

@section('content')

    <div class="validate-wrapper">バリデーションあるよ
        @if (session('status'))
            <div class="validate">
                <p>{{ session('status') }}</p>
            </div>
        @endif
    </div>

    <p>ログイン中のユーザー名：{{ Auth::user()->name }}</p>
    <p>Account:{{ sprintf('%04d', Auth::user()->id) }}</p>

    <div class="wrapper">
        <h1>ここに追加していく</h1>

        <p>・css・jsファイル作成：vite.config.jsに追記["resources/css/style.css"] <br>→npm run buildとnpm run devが必要かも</p>

        <p>・ルートの指定：routes/web.phpに <br>
            Route::get('/example', function () {return view('example');}); で表示できる<br>http://127.0.0.1/exampleでアクセス可能</p>
    </div>


    <div class="wrapper">
        <a href="{{ route('profile.edit') }}"><button>アカウント編集</button></a>


    </div>
    <div class="wrapper">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button" class="nav-item">ログアウト</button>
        </form>
    </div>
@endsection
