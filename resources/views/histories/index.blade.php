{{-- @php
  // UI確認用ダミーデータ（あとでコントローラから渡す想定）
  $histories = $histories ?? collect([
    (object)[
      'store_name'   => 'なんばスカイオ店',
      'status'       => 'available',
      'product_name' => 'ほうじ茶フラペチーノ',
      'comment'      => '甘さ控えめ。スッキリ飲めて最高！',
      'created_at'   => '2026/01/21 20:55'
    ],
    (object)[
      'store_name'   => '梅田ルクア店',
      'status'       => 'soldout',
      'product_name' => '抹茶ラテ',
      'comment'      => '夕方にはもう無かったです…',
      'created_at'   => '2026/01/21 18:48'
    ],
  ]);
@endphp --}}

{{-- <x-app-layout>
  <x-review-frame
    account="Account No.0001"
    active="history"
    nav="menu"
    title="投稿履歴"
  >
    <main class="history-list">
      @foreach ($histories as $h)

        <article class="review-index-card history-card">
          <div class="review-index-card-head"> --}}
            {{-- ✅ 左：店舗名だけ表示（ユーザー名・アイコンは無し） --}}
            {{-- <div class="history-store">
              <span class="history-store-name">{{ $h->store_name }}</span>
            </div> --}}

            {{-- 右：日時 --}}
            {{-- <time class="review-index-time">{{ $h->created_at }}</time>
          </div>

          @if ($h->status === 'available')
            <div class="review-index-status is-available">販売状況：まだある</div>
          @else
            <div class="review-index-status is-soldout">販売状況：もうない</div>
          @endif

          <div class="review-index-product">商品名：{{ $h->product_name }}</div>
          <p class="review-index-comment">{{ $h->comment }}</p>

          <div class="history-actions">
            <a class="history-edit-btn" href="{{ url('/history-edit') }}">
              <span class="material-symbols-rounded">edit</span>
              編集する
            </a>

            <button type="button" class="history-delete-btn" aria-label="削除">
              <span class="material-symbols-rounded">delete</span>
            </button>
          </div>
        </article>
      @endforeach
    </main>
  </x-review-frame>
</x-app-layout> --}}
