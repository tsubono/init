<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$language = DB::table('mst_languages')->where('name', '日本語')->first();
        if (empty($language)) {
            DB::table('mst_languages')->insert([
                    [ 'name' => '日本語' ],
                    [ 'name' => 'アメリカ語' ],
                    [ 'name' => 'イギリス語' ],
                    [ 'name' => 'フランス語' ],
                    [ 'name' => '中国語' ],
                    [ 'name' => 'ドイツ語' ],
                    [ 'name' => '韓国語' ],
                    // TODO: 正規データに置き換え
                ]
            );
        }
	}
}
