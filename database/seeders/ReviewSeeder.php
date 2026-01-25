<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 1,
                'product' => 'スターバックスラテ',
                'message' => '今日はブロンドローストののエスプレッソが選べましたよ！',
            ],
            [
                'user_id' => 1,
                'status_id' => 2,
                'starbucks_store_id' => 2,
                'product' => 'カフェモカ',
                'message' => '甘さ控えめでチョコの風味がしっかりしていました。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 3,
                'product' => 'キャラメルマキアート',
                'message' => 'キャラメルの香りが良く、安定のおいしさです。',
            ],
            [
                'user_id' => 1,
                'status_id' => 2,
                'starbucks_store_id' => 4,
                'product' => 'カプチーノ',
                'message' => 'フォームミルクがふわふわで飲みやすかったです。',
            ],
            [
                'user_id' => 1,
                'status_id' => 2,
                'starbucks_store_id' => 5,
                'product' => 'ドリップコーヒー',
                'message' => '苦味とコクのバランスが良い一杯でした。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 6,
                'product' => 'ソイラテ',
                'message' => 'ソイミルクの甘みが感じられて飲みやすいです。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 7,
                'product' => 'アーモンドミルクラテ',
                'message' => 'ナッツの風味がコーヒーとよく合っていました。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 8,
                'product' => 'ディカフェラテ',
                'message' => '夜でも安心して飲めるのが嬉しいです。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 9,
                'product' => 'カフェアメリカーノ',
                'message' => 'すっきりしていて仕事中にぴったりでした。',
            ],
            [
                'user_id' => 1,
                'status_id' => 2,
                'starbucks_store_id' => 10,
                'product' => 'ホワイトモカ',
                'message' => '甘党にはたまらない一杯です。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 11,
                'product' => '抹茶クリームラテ',
                'message' => '抹茶の香りがしっかりしていて満足感があります。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 12,
                'product' => 'ほうじ茶ティーラテ',
                'message' => '香ばしさがクセになる味でした。',
            ],
            [
                'user_id' => 1,
                'status_id' => 2,
                'starbucks_store_id' => 13,
                'product' => 'チャイティーラテ',
                'message' => 'スパイスが効いていて体が温まります。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 14,
                'product' => 'アイスコーヒー',
                'message' => '暑い日にぴったりの爽やかさでした。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 15,
                'product' => 'アイスラテ',
                'message' => 'ミルクとコーヒーのバランスが良いです。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 16,
                'product' => 'エスプレッソ',
                'message' => '短時間で気分を切り替えたい時に最適。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 17,
                'product' => 'フラペチーノ',
                'message' => 'デザート感覚で楽しめました。',
            ],
            [
                'user_id' => 1,
                'status_id' => 1,
                'starbucks_store_id' => 18,
                'product' => 'マンゴーパッションティー',
                'message' => 'フルーティーで後味がすっきりしています。',
            ],
            [
                'user_id' => 1,
                'status_id' => 2,
                'starbucks_store_id' => 19,
                'product' => 'ユースベリー',
                'message' => '香りが良く、リラックスできました。',
            ],
            [
                'user_id' => 1,
                'status_id' => 2,
                'starbucks_store_id' => 20,
                'product' => 'イングリッシュブレックファストティーラテ',
                'message' => 'ミルクティー好きにはおすすめです。',
            ],
        ];
        foreach ($reviews as $review) {
            Review::firstOrCreate($review);
        }
    }
}
