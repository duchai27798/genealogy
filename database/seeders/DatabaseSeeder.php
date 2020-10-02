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
        $this->call(RoleSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(PersonStatusSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClanSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(ParentStatusSeeder::class);
        $this->call(ParentInfoSeeder::class);
        $this->call(UpdatePersonSeeder::class);
    }
}

