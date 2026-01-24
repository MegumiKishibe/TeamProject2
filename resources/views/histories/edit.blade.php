{{-- @php
  // UI確認用（あとで controller から $review が来る想定）
  $review = $review ?? (object)[
    'product_name' => 'ほうじ茶フラペチーノ',
    'status' => 'available',
    'comment' => "甘さ控えめ。スッキリ飲めて最高！\nホイップ増量＆ブラウンシュガートッピングが\nおすすめです♪",
  ];
@endphp --}}

{{-- <x-app-layout>
  <x-histories.frame
    store="なんばスカイオ店"
    account="Account No.0001"
    title="口コミ編集"
    :hide-store="true"
  >
    <form action="#" method="POST" class="review-create-form">
      @csrf --}}
      {{-- 本当は edit なら PUT/PATCH にする（UI確認なら不要でもOK） --}}
      {{-- @method('PATCH') --}}

      {{-- 以下は投稿履歴で選択した口コミの編集フォームを表示 --}}
      {{-- <main class="review-create-main">
        <div class="review-field"> --}}
          {{-- ✅ 店舗名（表示のみ） --}}
          {{-- <div class="review-label store-display" aria-hidden="true">
            {{ $store ?? 'なんばスカイオ店' }}
          </div> --}}

          {{-- <label class="review-label" for="product">商品名</label>
          <input
            id="product"
            type="text"
            name="product"
            class="review-input"
            value="{{ old('product', $review->product_name) }}"
          >
        </div>
        <div class="review-field">
          <label class="review-label" for="status">販売状況</label>

          <div class="review-select-wrap">
            <select id="status" name="status" class="review-select">
              <option value="available" @selected(old('status', $review->status) === 'available')>まだある</option>
              <option value="soldout" @selected(old('status', $review->status) === 'soldout')>もうない</option>
            </select>
            <span class="review-select-caret" aria-hidden="true"></span>
          </div>
        </div>

        <div class="review-field">
          <label class="review-label" for="message">メッセージ</label>
          <textarea
            id="message"
            name="message"
            rows="6"
            class="review-textarea"
          >{{ old('message', $review->comment) }}</textarea>
        </div>
      </main>

      <footer class="review-submit">
        <button type="submit" class="review-submit-btn">
          <span class="review-submit-label">更新する</span>
        </button>
      </footer>
    </form>
  </x-histories.frame>
</x-app-layout> --}}
