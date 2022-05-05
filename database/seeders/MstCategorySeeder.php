<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = DB::table('mst_categories')->first();
        if (empty($category)) {
            DB::table('mst_categories')->insert([
                    [ 'id' => 1, 'mst_room_id' => 1, 'name' => '語学', 'icon_path' => asset('img/category/icon-language.svg'), 'name_en' => 'Language' ],
                    [ 'id' => 2, 'mst_room_id' => 1, 'name' => '資格所得', 'icon_path' => asset('img/category/icon-qualification.svg'), 'name_en' => 'Qualification acquisition' ],
                    [ 'id' => 3, 'mst_room_id' => 2, 'name' => 'ファッション', 'icon_path' => asset('img/category/icon-fashion.svg'), 'name_en' => 'fashion' ],
                    [ 'id' => 4, 'mst_room_id' => 2, 'name' => 'ビューティ', 'icon_path' => asset('img/category/icon-beauty.svg'), 'name_en' => 'Beauty' ],
                    [ 'id' => 5, 'mst_room_id' => 2, 'name' => 'ライフスタイル', 'icon_path' => asset('img/category/icon-lifestyle.svg'), 'name_en' => 'Lifestyle' ],
                    [ 'id' => 6, 'mst_room_id' => 2, 'name' => 'フィットネス', 'icon_path' => asset('img/category/icon-fitness.svg'), 'name_en' => 'Fitness' ],
                    [ 'id' => 7, 'mst_room_id' => 3, 'name' => '語学', 'icon_path' => asset('img/category/icon-language.svg'), 'name_en' => 'Language' ],
                    [ 'id' => 8, 'mst_room_id' => 3, 'name' => 'IT', 'icon_path' => asset('img/category/icon-it.svg'), 'name_en' => 'IT' ],
                    [ 'id' => 9, 'mst_room_id' => 3, 'name' => '音楽', 'icon_path' => asset('img/category/icon-music.svg'), 'name_en' => 'music' ],
                    [ 'id' => 10, 'mst_room_id' => 3, 'name' => '芸術', 'icon_path' => asset('img/category/icon-design.svg'), 'name_en' => 'art' ],
                    [ 'id' => 11, 'mst_room_id' => 3, 'name' => 'スポーツ', 'icon_path' => asset('img/category/icon-sports.svg'), 'name_en' => 'Sports' ],
                    [ 'id' => 12, 'mst_room_id' => 3, 'name' => 'セラピー・占い', 'icon_path' => asset('img/category/icon-therapy.svg'), 'name_en' => 'Therapy / fortune-telling' ],
                ]
            );
        }
	}
}
