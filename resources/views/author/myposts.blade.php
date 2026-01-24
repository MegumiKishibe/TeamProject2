<x-app-layout>
    <x-review-frame active="history" nav="menu" title="投稿履歴">

        <div class="validate-wrapper">
            @if (session('status'))
                <div class="validate toast-notification" id="status-toast">
                    <p>{{ session('status') }}</p>
                </div>
            @endif
        </div>

        <main class="history-list">
            <form action="{{ route('author.myposts') }}" method="GET" id="filter-form">
                <input type="hidden" name="starbucks_store_id" value="{{ request('starbucks_store_id') }}">

                <label for="days">表示期間：</label>
                <select name="days" onchange="document.getElementById('filter-form').submit()">
                    <option value="">1週間以内をすべて表示</option>
                    <option value="1" {{ request('days') == '1' ? 'selected' : '' }}>昨日</option>
                    <option value="2" {{ request('days') == '2' ? 'selected' : '' }}>2日前</option>
                    <option value="3" {{ request('days') == '3' ? 'selected' : '' }}>3日前</option>
                    <option value="4" {{ request('days') == '4' ? 'selected' : '' }}>4日前</option>
                </select>
            </form>

            @forelse ($reviews as $review)
                <article class="review-index-card history-card">
                    <div class="review-index-card-head">
                        <div class="history-store">
                            <h1>{{ $review->starbucksStore->name ?? '店舗不明' }}</h1>
                            {{-- #TODO:24時間デザインお願いします --}}
                            <span class="">
                                @if ($review->created_at->gt(now()->subDay()))
                                    {{-- 24時間以内の場合 --}}
                                    <p style="color: red; font-weight: bold; margin: 0;">🔥新着</p>
                                @else
                                    {{-- 24時間より前の場合 --}}
                                    <time class="review-index-time" style="color: #666; font-size: 0.9em;">
                                        {{ $review->created_at->format('Y/m/d H:i') }}
                                    </time>
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="review-index-likes">
                        <div class="review-index-likes-btn">
                            <span class="material-symbols-rounded likes-icon"
                                aria-hidden="true">favorite</span>{{ $review->likes_count }}
                        </div>
                    </div>

                    <div class="review-index-product">商品名：{{ $review->product }}</div>

                    <div class="review-index-status {{ $review->status_id == 1 ? 'is-available' : 'is-soldout' }}">
                        販売状況：{{ $review->status->name }}
                    </div>

                    <p class="review-index-comment">{{ $review->message }}</p>


                    {{-- #TODO:削除するボタンが上手く表示されない --}}
                    <div class="history-actions">
                        <a href="{{ route('review.edit', ['id' => $review->id]) }}">
                            <button class="history-edit-btn">
                                <span class="material-symbols-rounded">edit</span>編集する</button></a>
                        <form action="{{ route('mypost.delete', ['id' => $review->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('本当に削除しますか？')" class="history-delete-btn">
                                <span class="material-symbols-rounded">delete</span>削除する</button>
                        </form>
                    </div>
                </article>

            @empty
                <div class="no-reviews">
                    @if (request('days'))
                        <main class="history-empty">
                            <div class="history-empty-icon" aria-hidden="true">
                                <span class="material-symbols-rounded">history</span>
                            </div>
                            <p class="history-empty-title">{{ request('days') }}日前の投稿はありません。</p>
                        </main>
                    @else
                        <main class="history-empty">
                            <div class="history-empty-icon" aria-hidden="true">
                                <span class="material-symbols-rounded">history</span>
                            </div>
                            <p>1週間前の投稿はありません。</p>
                        </main>
                    @endif
                </div>
            @endforelse

        </main>

    </x-review-frame>
</x-app-layout>
