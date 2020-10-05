<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class UpdatePersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::find(2)->update(['parent_info_id' => 1]);
        Person::find(5)->update(['parent_info_id' => 1]);
        Person::find(10)->update(['parent_info_id' => 1]);
        Person::find(3)->update(['parent_info_id' => 2]);
        Person::find(4)->update(['parent_info_id' => 2]);
        Person::find(6)->update(['parent_info_id' => 3]);
        Person::find(7)->update(['parent_info_id' => 3]);
        Person::find(8)->update(['parent_info_id' => 3]);
        Person::find(9)->update(['parent_info_id' => 4]);
    }
}
