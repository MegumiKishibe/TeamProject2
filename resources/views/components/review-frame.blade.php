@props([
    'store' => '',
    'account' => '',
    'active' => null,
    'nav' => 'menu',
    'title' => null,
])

<div class="review-create-page">
    <div class="review-create-card">
        <header class="review-create-header">
            <div class="review-create-header-row">
                <span class="review-create-brand">まだある？ナビ</span>
                <span class="review-create-account">{{ $account }}</span>
            </div>

            {{-- ✅ メインタイトル（中央） --}}
            @if ($title)
                <h1 class="frame-title frame-title--center">{{ $title }}</h1>
            @endif

            {{-- ✅ 店舗名はサブにする --}}
            <p class="review-create-store">{{ $store }}</p>

            @if ($nav === 'menu')
                <div class="review-menu-row">
                    <a href="{{ route('author.reviews') }}">
                        <button type="button" class="review-menu-btn">MENU</button></a>
                </div>
            @endif
        </header>

        {{ $slot }}
    </div>
</div>

