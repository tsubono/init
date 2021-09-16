<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = DB::table('mst_rooms')->first();
        if (empty($category)) {
            DB::table('mst_rooms')->insert([
                    ['id' => 1,  'name' => 'ビジネスルーム' ],
                    ['id' => 2, 'name' => '自分磨きルーム' ],
                    ['id' => 3, 'name' => 'スキルアップルーム'],
                ]
            );
        }
	}
}
