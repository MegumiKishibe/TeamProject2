<?php

namespace Database\Seeders;

use App\Models\StarbucksStore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarbucksstoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $starbucks_stores = [
            [
                'name' => '大阪城公園店',
                'address' => '大阪府 大阪市中央区 大阪城 3-1 JO-TERRACE OSAKA',
                'lat' => 34.68975903060881,
                'lng' => 135.53223013243388,
            ],
            [
                'name' => '大阪城公園森ノ宮店',
                'address' => '大阪府 大阪市中央区 大阪城 3-9',
                'lat' => 34.683384466265146,
                'lng' => 135.53181804178755,
            ],
            [
                'name' => '谷町筋ＮＳビル店',
                'address' => '大阪府 大阪市中央区 谷町 2-2-22 ＮＳビル 1F',
                'lat' => 34.68656172622393,
                'lng' => 135.51757099576213,
            ],
            [
                'name' => '天満橋京阪シティモール店',
                'address' => '大阪府 大阪市中央区 天満橋京町 1-1 京阪シティモール',
                'lat' => 34.69030915002835,
                'lng' => 135.51651008596488,
            ],
            [
                'name' => 'ＯＢＰ松下ＩＭＰビル店',
                'address' => '大阪府 大阪市中央区 城見 1-3-7 松下 IMP ビル',
                'lat' => 34.69183122346711,
                'lng' => 135.5305559399396,
            ],
            [
                'name' => '淀屋橋 odona 店',
                'address' => '阪府 大阪市中央区 今橋 4-1-1 淀屋橋 odona B1F',
                'lat' => 34.69100186189843,
                'lng' => 135.5005360859649,
            ],
            [
                'name' => '北浜店',
                'address' => '大阪府 大阪市中央区 今橋 2-2-2 南都銀行大阪北浜ビル 1 階',
                'lat' => 34.69033035471832,
                'lng' => 135.50641244178746,
            ],
            [
                'name' => '御堂筋本町店',
                'address' => '大阪府 大阪市中央区 本町 4-2-12 野村不動産御堂筋本町ビル',
                'lat' => 34.683500376290205,
                'lng' => 135.50018512644567,
            ],
            [
                'name' => '堺筋本町店',
                'address' => '大阪府 大阪市中央区 本町 1-8-12 オーク堺筋本町ビル 1F',
                'lat' => 34.68400333194051,
                'lng' => 135.507127739939,
            ],
            [
                'name' => 'PMO EX 本町店',
                'address' => '大阪府 大阪市中央区 本町 3-1-10 PMO EX 本町 1 階',
                'lat' => 34.6838730965322,
                'lng' => 135.50293251110367,
            ],
        ];


        foreach ($starbucks_stores as $starbucks_store) {
            StarbucksStore::firstOrCreate($starbucks_store);
        }
    }
}
