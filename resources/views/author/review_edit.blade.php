<x-app-layout>
    <x-histories.frame title="" :hide-store="true">
        @error('name')
            <div class="validate-wrapper">
                <div class="validate">
                    <p>{{ $message }}</p>
                </div>
            </div>
        @enderror


        <form action="{{ route('review.update', ['id' => $review->id]) }}" method="POST" class="review-create-form">
            @csrf
            @method('PUT')

            <main class="review-create-main">
                <div class="review-field">
                    {{-- ✅ 店舗名（表示のみ） --}}
                    <div class="review-label store-display" aria-hidden="true">
                        <select name="starbucks_store_id">
                            <option value="">選択してください</option>
                            @foreach ($starbucksStores as $store)
                                <option value="{{ $store->id }}" @if (old('starbucks_store_id', $review->starbucks_store_id) == $store->id) selected @endif>
                                    {{ $store->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <label class="review-label" for="product">商品名</label>
                    <input id="product" type="text" name="product" class="review-input"
                        value="{{ old('product', $review->product) }}">
                </div>

                <div class="review-field">
                    <label class="review-label" for="status">販売状況</label>
                    <div class="review-select-wrap">
                        <select name="status_id" id="status_id" class="form-select">
                            <option value="">選択してください</option>

                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" @if (old('status_id', $review->status_id ?? '') == $status->id) selected @endif>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="review-field">
                    <label class="review-label" for="message">メッセージ</label>
                    <textarea id="message" name="message" rows="6" class="review-textarea">{{ old('message', $review->message) }}</textarea>
                </div>
            </main>

            <footer class="review-submit">
                <button type="submit" class="review-submit-btn">
                    <span class="review-submit-label">更新する</span>
                </button>
            </footer>
        </form>
    </x-histories.frame>
</x-app-layout>
