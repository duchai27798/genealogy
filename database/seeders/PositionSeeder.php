<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::insert([
            ['name' => 'child', 'description' => ''],
            ['name' => 'son-in-law', 'description' => ''],
            ['name' => 'daughter-in-law', 'description' => ''],
            ['name' => 'root', 'description' => ''],
        ]);
    }
}
