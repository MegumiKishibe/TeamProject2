<x-app-layout>
    <x-review-frame store="{{ $starbucksStore->name }}" active="create">

        {{-- #TODO:ひとつ前に戻るボタンが必要 or 口コミ一覧ページへ切り替える --}}
        <a href="{{ url()->previous() }}">
            <button>戻る</button></a>

        {{-- #TODOバリデーションエラーを表示する 未入力時 --}}
        <div class="validate-wrapper">
            @if (session('status'))
                <div class="validate">
                    <p>{{ session('status') }}</p>
                </div>
            @endif
        </div>


        <form action="{{ route('review.store') }}" method="POST" class="review-create-form">
            @csrf

            @if (isset($starbucksStore))
                <input type="hidden" name="starbucks_store_id" value="{{ $starbucksStore->id }}">
            @endif

            <main class="review-create-main">
                <div class="review-field">
                    <label class="review-label" for="product">商品名</label>
                    <input id="product" type="text" name="product" placeholder="ほうじ茶フラペチーノ" class="review-input"
                        value="{{ old('product') }}">
                </div>

                <div class="review-field">
                    <label class="review-label" for="status">販売状況</label>

                    <div class="review-select-wrap">
                        <select id="status" name="status_id" class="review-select">
                            <option value="">選択してください</option>

                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" @if (old('status_id') == $status->id) selected @endif>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="review-select-caret" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="review-field">
                    <label class="review-label" for="message">メッセージ</label>
                    <textarea id="message" name="message" rows="6"
                        placeholder="甘さ控えめ。スッキリ飲めて最高！&#10;ホイップ増量＆ブラウンシュガートッピングが&#10;おすすめです♪" class="review-textarea">{{ old('message') }}</textarea>
                </div>
            </main>

            <footer class="review-submit">
                <button type="submit" class="review-submit-btn">
                    <span class="review-submit-label">投稿する</span>
                </button>
            </footer>
        </form>

    </x-review-frame>
</x-app-layout>
