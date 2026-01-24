{{-- http://127.0.0.1:8000/profile --}}

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>新規登録 | まだある？ナビ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="page">
    <main class="card card--plain">
        <div class="brand-row brand-row--split">
            <div class="brand jp">まだある？ナビ</div>
            <div class="account-no en">Account:{{ sprintf('%04d', Auth::user()->id) }}</div>
        </div>

        <h1 class="page-title jp">アカウント編集</h1>


        <div class="validate-wrapper">
            @if (session('status'))
                <div class="validate">
                    <p>{{ session('status') }}</p>
                </div>
            @endif
        </div>

        <form class="form form--spacious" method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="field">
                <input id="name" class="input en" type="text" name="name" placeholder="Username"
                    autocomplete="username" value="{{ old('name', $user->name) }}" required autofocus>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            <div class="field">
                <input class="input en" type="password" name="password" placeholder="Password"
                    autocomplete="new-password" value="{{ old('password') }}" id="update_password_password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <div class="field">
                <input class="input en" type="email" name="email" placeholder="Email" autocomplete="email"
                    value="{{ old('email', $user->email) }}" id="email" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="btn btn--md en">
                <button>{{ __('Save') }}</button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
        <div class="links">
            <a class="link en" href="{{ route('author.search') }}">MENU</a>
        </div>
    </main>
</body>
