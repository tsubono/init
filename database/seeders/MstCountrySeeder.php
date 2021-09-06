<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$country = DB::table('mst_countries')->where('name', '日本')->first();
        if (empty($country)) {
            DB::table('mst_countries')->insert([
                    [ 'name' => '日本' ],
                    [ 'name' => 'アメリカ' ],
                    [ 'name' => 'イギリス' ],
                    [ 'name' => 'フランス' ],
                    [ 'name' => '中国' ],
                    [ 'name' => 'ドイツ' ],
                    [ 'name' => '韓国' ],
                    // TODO: 正規データに置き換え
                ]
            );
        }
	}
}
