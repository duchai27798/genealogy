<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::insert([
            ['name' => 'male'],
            ['name' => 'female'],
            ['name' => 'others'],
        ]);
    }
}
