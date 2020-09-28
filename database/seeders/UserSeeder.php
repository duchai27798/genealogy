<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            ['name' => 'admin', 'email' => 'hainguyen27798@gmail.com', 'password' => '$2y$12$ml.s5z1sl0rvtQMCtf5bCuxNRHsnuw/DARx6xJXKyDbCWxW2ocMFq', 'role_id' => 1]
        ]);
    }
}
