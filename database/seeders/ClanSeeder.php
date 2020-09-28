<?php

namespace Database\Seeders;

use App\Models\Clan;
use Illuminate\Database\Seeder;

class ClanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clan::insert([
            ['user_id' => 2, 'name' => 'Nguyễn Đức', 'date' => '2020-01-01', 'location_address' => ''],
        ]);
    }
}
