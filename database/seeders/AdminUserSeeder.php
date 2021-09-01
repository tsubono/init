<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user = DB::table('admin_users')->where('email', 'admin@test.com')->first();
        if (empty($user)) {
            $now = \Carbon\Carbon::now();
            DB::table('admin_users')->insert([
                    [
                        'name' => 'Init管理者',
                        'email' => 'admin@test.jp',
                        'password' => \Hash::make('test'),
                        'email_verified_at' => $now,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                ]
            );
        }
	}
}
