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
        $category = DB::table('mst_categories')->where('name', '日本')->first();
        if (empty($category)) {
            DB::table('mst_categories')->insert([
                    [ 'mst_room_id' => 1, 'name' => '語学' ],
                    [ 'mst_room_id' => 1, 'name' => '資格所得' ],
                    [ 'mst_room_id' => 2, 'name' => 'ファッション' ],
                    [ 'mst_room_id' => 2, 'name' => 'ライフスタイル' ],
                    [ 'mst_room_id' => 2, 'name' => 'ビューティ' ],
                    [ 'mst_room_id' => 2, 'name' => 'フィットネス' ],
                    [ 'mst_room_id' => 3, 'name' => '語学' ],
                    [ 'mst_room_id' => 3, 'name' => '音楽' ],
                    [ 'mst_room_id' => 3, 'name' => 'スポーツ' ],
                    [ 'mst_room_id' => 3, 'name' => 'IT' ],
                    [ 'mst_room_id' => 3, 'name' => '芸術' ],
                    [ 'mst_room_id' => 3, 'name' => 'セラピー' ],
                    // TODO: 正規データに置き換え
                ]
            );
        }
	}
}
