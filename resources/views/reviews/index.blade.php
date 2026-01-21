<x-app-layout>
  <div class="review-create-page">
    <div class="review-create-card">

      <header class="review-create-header">
        <div class="review-create-header-row">
          <span class="review-create-brand">まだある？ナビ</span>
          <span class="review-create-account">Account No.0001</span>
        </div>

        <h1 class="review-create-store">なんばスカイオ店</h1>

        <div class="review-create-tabs">
          <a href="{{ url('/review') }}" class="tab-item is-active" aria-current="page">
            <span class="material-symbols-rounded tab-icon">list_alt</span>
            <span class="tab-label">口コミ一覧</span>
          </a>

          <a href="{{ url('/create') }}" class="tab-item">
            <span class="material-symbols-rounded tab-icon">edit_note</span>
            <span class="tab-label">投稿する</span>
          </a>

          <button type="button" class="tab-item" onclick="history.back()">
            <span class="material-symbols-rounded tab-icon">arrow_back</span>
            <span class="tab-label">戻る</span>
          </button>
        </div>
      </header>

      {{-- main --}}
      @if (empty($reviews) || $reviews->isEmpty())
        <main class="review-index-empty">
          <p class="review-index-empty-title">過去 1 週間の投稿はありません</p>
          <p class="review-index-empty-sub">現在の状況を知っている方は、ぜひ最初の情報を教えてください！</p>

          <a
            class="review-index-empty-btn"
            href="{{ Route::has('reviews.create') ? route('reviews.create') : url('/create') }}"
          >
            最初の口コミを投稿する
          </a>
        </main>
      @else
        <main class="review-index-main">
          @foreach ($reviews as $review)
            <article class="review-index-card">
              <div class="review-index-card-head">
                <div class="review-index-user">
                  <span class="user-hex" aria-hidden="true">
                    <span class="material-symbols-rounded">person</span>
                  </span>
                  <span class="review-index-user-name">{{ $review->user_name }}</span>
                </div>

                <time class="review-index-time">
                  {{ \Carbon\Carbon::parse($review->created_at)->timezone('Asia/Tokyo')->format('Y/m/d H:i') }}
                </time>
              </div>

              @if ($review->status === 'available')
                <div class="review-index-status is-available">販売状況：まだある</div>
              @else
                <div class="review-index-status is-soldout">販売状況：もうない</div>
              @endif

              <div class="review-index-product">商品名：{{ $review->product_name }}</div>
              <p class="review-index-comment">{{ $review->comment }}</p>
            </article>
          @endforeach
        </main>
      @endif

    </div>
  </div>
</x-app-layout>
