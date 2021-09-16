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
                    [ 'id' => 1, 'mst_room_id' => 1, 'name' => '語学', 'icon_path' => asset('img/category/icon-language.svg') ],
                    [ 'id' => 2, 'mst_room_id' => 1, 'name' => '資格所得', 'icon_path' => asset('img/category/icon-qualification.svg') ],
                    [ 'id' => 3, 'mst_room_id' => 2, 'name' => 'ファッション', 'icon_path' => asset('img/category/icon-fashion.svg') ],
                    [ 'id' => 4, 'mst_room_id' => 2, 'name' => 'ビューティ', 'icon_path' => asset('img/category/icon-beauty.svg') ],
                    [ 'id' => 5, 'mst_room_id' => 2, 'name' => 'ライフスタイル', 'icon_path' => asset('img/category/icon-lifestyle.svg') ],
                    [ 'id' => 6, 'mst_room_id' => 2, 'name' => 'フィットネス', 'icon_path' => asset('img/category/icon-fitness.svg') ],
                    [ 'id' => 7, 'mst_room_id' => 3, 'name' => '語学', 'icon_path' => asset('img/category/icon-language.svg') ],
                    [ 'id' => 8, 'mst_room_id' => 3, 'name' => 'IT', 'icon_path' => asset('img/category/icon-it.svg') ],
                    [ 'id' => 9, 'mst_room_id' => 3, 'name' => '音楽', 'icon_path' => asset('img/category/icon-music.svg') ],
                    [ 'id' => 10, 'mst_room_id' => 3, 'name' => '芸術', 'icon_path' => asset('img/category/icon-design.svg') ],
                    [ 'id' => 11, 'mst_room_id' => 3, 'name' => 'スポーツ', 'icon_path' => asset('img/category/icon-sports.svg') ],
                    [ 'id' => 12, 'mst_room_id' => 3, 'name' => 'セラピー・占い', 'icon_path' => asset('img/category/icon-therapy.svg') ],
                ]
            );
        }
	}
}
