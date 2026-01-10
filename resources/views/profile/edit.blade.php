{{-- http://127.0.0.1:8000/profile --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            アカウント編集画面
        </h2>
    </x-slot>

    {{-- バリデーメッセージ用 --}}
    <div class="validate-wrapper">バリデーションあるよ
        @if (session('status'))
            <div class="validate">
                <p>{{ session('status') }}</p>
            </div>
        @endif
        <x-input-error :messages="$errors->get('password')" />
    </div>



    <div class="py-12">
        <section>
            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                {{-- user_name -------------------------------------------------------- --}}
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                {{-- email -------------------------------------------------------- --}}

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                {{-- パスワード -------------------------------------------------------- --}}
                <div>
                    <x-input-label for="update_password_password" :value="__('New Password')" />
                    <x-text-input id="update_password_password" name="password" type="password"
                        class="mt-1 block w-full" autocomplete="new-password" />

                </div>
                {{-- 保存ボタン --}}

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'password-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                    @endif

                </div>
            </form>
        </section>
    </div>

    <div class="wrapper">
        <a href="{{ route('example') }}"><button>ホーム画面へ戻る</button></a>
    </div>

</x-app-layout>
