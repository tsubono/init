<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$setting = DB::table('setting')->first();
        if (empty($setting)) {
            DB::table('setting')->insert([
                    [
                        'is_maintenance' => false,
                    ]
                ]
            );
        }
	}
}
