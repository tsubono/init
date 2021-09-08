<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(MstCountrySeeder::class);
        $this->call(MstLanguageSeeder::class);
        $this->call(MstRoomSeeder::class);
        $this->call(MstCategorySeeder::class);
    }
}
