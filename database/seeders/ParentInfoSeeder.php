<?php

namespace Database\Seeders;

use App\Models\ParentInfo;
use Illuminate\Database\Seeder;

class ParentInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParentInfo::insert([
            ['mother_id' => null, 'father_id' => 1, 'parent_status_id' => null, 'wedding_date' => '2020-01-01', 'divorce_date' => '2020-01-01', 'description' => ''],
            ['mother_id' => null, 'father_id' => 2, 'parent_status_id' => null, 'wedding_date' => '2020-01-01', 'divorce_date' => '2020-01-01', 'description' => ''],
            ['mother_id' => 5, 'father_id' => null, 'parent_status_id' => null, 'wedding_date' => '2020-01-01', 'divorce_date' => '2020-01-01', 'description' => ''],
            ['mother_id' => null, 'father_id' => 10, 'parent_status_id' => null, 'wedding_date' => '2020-01-01', 'divorce_date' => '2020-01-01', 'description' => ''],
        ]);
    }
}
