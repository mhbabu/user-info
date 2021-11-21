<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
           'name' => 'Admin',
           'email' => 'admin@gmail.com',
           'password' => bcrypt('123456'),
           'email_verified_at' => Carbon::now()->format('Y-m-d','H:i:s'),
           'created_at' => Carbon::now()->format('Y-m-d','H:i:s'),
           'updated_at' => Carbon::now()->format('Y-m-d','H:i:s'),
       ]);
    }
}
