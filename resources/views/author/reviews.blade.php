<x-app-layout>
    <x-review-frame active="history" nav="menu" :store="$reviews->first()?->starbucksStore->name">
        <a
            href="{{ url('/author-review-create') }}?starbucks_store_id={{ request('starbucks_store_id') }}"><button>投稿する</button></a>

        <div class="validate-wrapper">
            @if (session('status'))
                <div class="validate">
                    <p>{{ session('status') }}</p>
                </div>
            @endif
        </div>

        {{-- #TODO:絞り機能おかしい、なおす --}}
        @if ($reviews->isNotEmpty())
            <form action="{{ route('author.reviews') }}" method="GET" id="filter-form">
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
        @endif

        <main class="history-list">
            @forelse($reviews as $review)
                <article class="review-index-card history-card">
                    <div class="review-index-card-head">
                        <div class="history-store">
                            <p>投稿者：{{ $review->user->name }}</p>
                            {{-- #TODO:24時間デザインお願いします --}}
                            <span class="">
                                @if ($review->created_at->gt(now()->subDay()))
                                    <button style="color: red; font-weight: bold;">🔥 24時間以内！</button>
                                @endif
                            </span>
                        </div>
                    </div>

                    <div>
                        <div class="review-index-status {{ $review->status_id == 1 ? 'is-available' : 'is-soldout' }}">
                            販売状況：{{ $review->status->name }}
                        </div>
                        <time class="review-index-time">{{ $review->created_at->format('Y/m/d H:i') }}</time>
                    </div>

                    <div>
                        <div class="review-index-product">商品名：{{ $review->product }}</div>
                        <p>いいね：{{ $review->likes_count }}
                        <form action="{{ route('reviews.like', $review) }}" method="POST">
                            @csrf
                            <button type="submit" style="background-color: bisque">いいねする</button>
                        </form>
                        </p>
                    </div>
                    <div>
                        <p class="review-index-comment">{{ $review->message }}</p>
                    </div>
                </article>
            @empty
                <main class="history-empty">
                    <div class="history-empty-icon" aria-hidden="true">
                        <span class="material-symbols-rounded">history</span>
                    </div>

                    <p class="history-empty-title">履歴がまだありません</p>
                    <p class="history-empty-sub">
                        店舗の在庫状況を投稿すると、ここに履歴として残ります。
                    </p>
                </main>
            @endforelse


        </main>
    </x-review-frame>
</x-app-layout>
