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
                    [ 'name' => '日本語', 'name_en' => 'Japanese' ],
                    [ 'name' => '英語', 'name_en' => 'English language' ],
                    [ 'name' => 'タイ語', 'name_en' => 'Thai' ],
                    [ 'name' => '韓国語', 'name_en' => 'Korean' ],
                ]
            );
        }
	}
}
