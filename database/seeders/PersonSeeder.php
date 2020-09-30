<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::insert([
            ['firstname' => 'Mark', 'lastname' => 'Hill', 'birthday' => '2020-01-01', 'phone_number' => '', 'email' => '', 'address' => '', 'description' => ''],
            ['firstname' => 'Joe', 'lastname' => 'Linux', 'birthday' => '2020-01-01', 'phone_number' => '', 'email' => '', 'address' => '', 'description' => ''],
            ['firstname' => 'Ron', 'lastname' => 'Blomquist', 'birthday' => '2020-01-01', 'phone_number' => '', 'email' => '', 'address' => '', 'description' => ''],
            ['firstname' => 'Michael', 'lastname' => 'Rubin', 'birthday' => '2020-01-01', 'phone_number' => '', 'email' => '', 'address' => '', 'description' => ''],
            ['firstname' => 'Linda', 'lastname' => 'May', 'birthday' => '2020-01-01', 'phone_number' => '', 'email' => '', 'address' => '', 'description' => ''],
            ['firstname' => 'Alice', 'lastname' => 'Lopez', 'birthday' => '2020-01-01', 'phone_number' => '', 'email' => '', 'address' => '', 'description' => ''],
            ['firstname' => 'Mary', 'lastname' => 'Johnson', 'birthday' => '2020-01-01', 'phone_number' => '', 'email' => '', 'address' => '', 'description' => ''],
            ['firstname' => 'Kirk', 'lastname' => 'Douglas', 'birthday' => '2020-01-01', 'phone_number' => '', 'email' => '', 'address' => '', 'description' => ''],
            ['firstname' => 'Erica', 'lastname' => 'Reel', 'birthday' => '2020-01-01', 'phone_number' => '', 'email' => '', 'address' => '', 'description' => ''],
            ['firstname' => 'John', 'lastname' => 'Green', 'birthday' => '2020-01-01', 'phone_number' => '', 'email' => '', 'address' => '', 'description' => ''],
        ]);
    }
}
