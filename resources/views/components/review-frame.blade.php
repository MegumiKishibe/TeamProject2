@props([
  'store' => 'なんばスカイオ店',
  'account' => 'Account No.0001',
  'active' => 'index', // index | create
])

<div class="review-create-page">
  <div class="review-create-card">

    {{-- ===== header (createと完全共通) ===== --}}
    <header class="review-create-header">
      <div class="review-create-header-row">
        <span class="review-create-brand">まだある？ナビ</span>
        <span class="review-create-account">{{ $account }}</span>
      </div>

      <h1 class="review-create-store">{{ $store }}</h1>

      <div class="review-create-tabs">
        <a href="/review" class="tab-item {{ $active === 'index' ? 'is-active' : '' }}">
          <span class="material-symbols-rounded tab-icon">list_alt</span>
          <span class="tab-label">口コミ一覧</span>
        </a>

        <a href="/create" class="tab-item {{ $active === 'create' ? 'is-active' : '' }}">
          <span class="material-symbols-rounded tab-icon">edit_note</span>
          <span class="tab-label">投稿する</span>
        </a>

        <button type="button" class="tab-item" onclick="history.back()">
          <span class="material-symbols-rounded tab-icon">arrow_back</span>
          <span class="tab-label">戻る</span>
        </button>
      </div>
    </header>

    {{-- ===== body slot ===== --}}
    <div class="review-frame-body">
      {{ $slot }}
    </div>

  </div>
</div>
