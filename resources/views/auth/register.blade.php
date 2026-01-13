<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>新規登録 | まだある？ナビ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="page">
    <main class="card card--plain">
        <div class="brand-row">
            <div class="brand jp">まだある？ナビ</div>
        </div>

        <h1 class="page-title jp">新規登録</h1>

        {{-- #TODO:バリデーションメッセージ追加わすれない、リクエスト作る --}}
        <div class="validate-wrapper">
            @if (session('status'))
                <div class="validate">
                    <p>{{ session('status') }}</p>
                </div>
            @endif
        </div>

        <form class="form form--spacious" method="POST" action="{{ route('register') }}"> @csrf
            <div class="field">
                <input class="input en" type="text" name="name" placeholder="Username" autocomplete="username"
                    value="{{ old('name') }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="field">
                <input class="input en" type="password" name="password" placeholder="Password"
                    autocomplete="new-password" value="{{ old('password') }}" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="field">
                <input class="input en" type="email" name="email" placeholder="Email" autocomplete="email"
                    value="{{ old('email') }}" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <button class="btn btn--md en" type="submit">Sign up</button>
        </form>

        <div class="links">
            <a class="link en" href="{{ route('login') }}">Login</a>
        </div>
    </main>
</body>

</html>
