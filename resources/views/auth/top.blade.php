<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>まだある？ナビ</title>

    {{-- ViteでCSS/JSを読み込む（npm run dev 必須） --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="page">
    <main class="card">
        <h1 class="title">まだある？ナビ</h1>
        <p class="subtitle">売り切れ状況をみんなで共有</p>

        <div class="validate-wrapper">
            @if (session('status'))
                <div class="validate">
                    <p>{{ session('status') }}</p>
                </div>
            @endif
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="divider"></div>

        <form class="form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="field">
                <input class="input" type="email" name="email" placeholder="Email" autocomplete="Email"
                    value="{{ old('email') }}" />
            </div>

            <div class="field">
                <input class="input" type="password" name="password" placeholder="Password"
                    autocomplete="current-password" required value="{{ old('password') }}" />
            </div>

            <button class="btn" type="submit">Login</button>
        </form>

        <div class="links">
            <a class="link" href="{{ route('register') }}">新規登録</a>
            <a class="link" href="{{ route('gest.map') }}">ログインせずに確認する</a>
        </div>
    </main>
</body>

</html>
