<?php

namespace Database\Seeders;

use App\Models\PersonStatus;
use Illuminate\Database\Seeder;

class PersonStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonStatus::insert([
            ['name' => 'live'],
            ['name' => 'died']
        ]);
    }
}
