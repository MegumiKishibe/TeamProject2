<x-app-layout>
    <x-review-frame active="history" nav="menu" :store="$currentStore?->name">

        <div class="validate-wrapper">
            @if (session('status'))
                <div class="validate toast-notification" id="status-toast">
                    <p>{{ session('status') }}</p>
                </div>
            @endif
        </div>

        <main class="history-list">
            <div class="filter-container">
                <form action="{{ route('author.reviews') }}" method="GET" id="filter-form">
                    <input type="hidden" name="starbucks_store_id" value="{{ request('starbucks_store_id') }}">
                    <select name="days" onchange="document.getElementById('filter-form').submit()"
                        class="select-custom">
                        <option value="">1週間以内をすべて表示</option>
                        <option value="1" {{ request('days') == '1' ? 'selected' : '' }}>昨日</option>
                        <option value="2" {{ request('days') == '2' ? 'selected' : '' }}>2日前</option>
                        <option value="3" {{ request('days') == '3' ? 'selected' : '' }}>3日前</option>
                        <option value="4" {{ request('days') == '4' ? 'selected' : '' }}>4日前</option>
                    </select>
                </form>

                <a href="{{ url('/author-review-create') }}?starbucks_store_id={{ request('starbucks_store_id') }}"
                    style="text-decoration: none;">
                    <button class="review-create-btn">
                        <span class="material-symbols-rounded">edit_square</span>
                        <span>投稿する</span>
                    </button>
                </a>

            </div>

            @forelse($reviews as $review)
                <article class="review-index-card history-card">
                    <div class="review-index-card-head">
                        <div class="history-store">
                            <p>{{ $review->user->name }}</p>
                            <span>
                                @if ($review->created_at->gt(now()->subDay()))
                                    {{-- 24時間以内の場合 --}}
                                    <div class="new-arrival">
                                        <p class="new-arrival-badge">New</p>
                                        <p>{{ $review->created_at->format('H:i') }}</p>
                                    </div>
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
                            <form action="{{ route('reviews.like', $review) }}" method="POST">
                                @csrf
                                <button type="submit"><span class="material-symbols-rounded likes-icon"
                                        aria-hidden="true">favorite</span></button>
                            </form>
                            <p>{{ $review->likes_count }}</p>
                        </div>
                    </div>

                    <div class="review-index-product">商品名：{{ $review->product }}</div>

                    <div class="review-index-status is-available">販売状況：{{ $review->status->name }}</div>

                    <p class="review-index-comment">{{ $review->message }}</p>
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
                            <p>この店舗の1週間以内のレビューはありません。</p>
                        </main>
                    @endif
                </div>
            @endforelse


        </main>
    </x-review-frame>
</x-app-layout>
