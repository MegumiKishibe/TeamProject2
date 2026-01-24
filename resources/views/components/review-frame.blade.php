@props([
    'store' => '',
    'active' => null,
    'nav' => 'menu',
    'title' => null,
])

<div class="review-create-page">
    <div class="review-create-card">
        <header class="review-create-header">
            <div class="review-create-header-row">
                <span class="review-create-brand">まだある？ナビ</span>
                <span class="review-create-account">
                    @auth
                        Account:{{ sprintf('%04d', Auth::user()->id) }}
                    @else
                        {{--  --}}
                    @endauth
                </span>
            </div>

            {{-- ✅ メインタイトル（中央） --}}
            @if ($title)
                <h1 class="frame-title frame-title--center">{{ $title }}</h1>
            @endif

            {{-- ✅ 店舗名はサブにする --}}
            <p class="review-create-store">{{ $store }}</p>

            @if ($nav === 'menu')
                <div class="review-menu-row">
                    @auth
                        {{-- ログイン中 --}}
                        <a href="{{ route('author.search') }}">
                            <button type="button" class="review-menu-btn">MENU</button>
                        </a>
                    @else
                        {{-- 未ログイン --}}
                        <a href="{{ route('gest.map') }}">
                            <button type="button" class="review-menu-btn">MENU</button>
                        </a>
                    @endauth
                </div>
            @endif
        </header>

        {{ $slot }}
    </div>
</div>
