<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clothes;

class ClothesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clothes = [
            [
                'name' => 'カジュアルTシャツ',
                'category' => 'トップス',
                'color' => '白',
                'price' => 2500,
                'size' => 'M',
                'description' => 'シンプルで着回しやすい定番Tシャツ',
            ],
            [
                'name' => 'デニムジーンズ',
                'category' => 'ボトムス',
                'color' => '青',
                'price' => 6800,
                'size' => 'L',
                'description' => 'ストレッチ素材で快適な穿き心地',
            ],
            [
                'name' => 'ニットセーター',
                'category' => 'トップス',
                'color' => '赤',
                'price' => 4500,
                'size' => 'S',
                'description' => '冬に最適な暖かいセーター',
            ],
            [
                'name' => 'スラックス',
                'category' => 'ボトムス',
                'color' => '黒',
                'price' => 5000,
                'size' => 'M',
                'description' => 'オフィスカジュアルにぴったりのスラックス',
            ],
            [
                'name' => 'ブレザージャケット',
                'category' => 'アウター',
                'color' => '紺',
                'price' => 12000,
                'size' => 'L',
                'description' => 'フォーマルからカジュアルまで対応可能',
            ],
            [
                'name' => 'パーカー',
                'category' => 'トップス',
                'color' => 'グレー',
                'price' => 3800,
                'size' => 'M',
                'description' => 'カジュアルに着こなせるフード付きパーカー',
            ],
            [
                'name' => 'レザージャケット',
                'category' => 'アウター',
                'color' => '茶',
                'price' => 18000,
                'size' => 'M',
                'description' => '本革製の高級感あるジャケット',
            ],
            [
                'name' => 'フレアスカート',
                'category' => 'ボトムス',
                'color' => '紫',
                'price' => 4200,
                'size' => 'S',
                'description' => '女性らしいシルエットのフレアスカート',
            ],
        ];

        foreach ($clothes as $item) {
            Clothes::create($item);
        }
    }
}
