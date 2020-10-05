<?php

namespace Database\Seeders;

use App\Models\ParentStatus;
use Illuminate\Database\Seeder;

class ParentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParentStatus::insert([
            ['name' => 'married', 'description' => ''],
            ['name' => 'divorce', 'description' => ''],
            ['name' => 'alone', 'description' => ''],
        ]);
    }
}
