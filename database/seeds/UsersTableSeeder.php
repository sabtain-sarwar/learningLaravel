<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usually what we do here is without including any model or anything like that.We use the raw
        // sql queries  and we say i want to access the table and we are selecting the users table and after
        // that we are chaining the insert method and inside insert it's going to take an array and here we
        // define what we want to insert into our table of named users
        DB::table('users')->insert([
            'name' => str_random(10),
            'role_id' =>2,
            'is_active' =>1,
            'email' => str_random(10).'@codingfaculty.com',
            'password' => bcrypt('secret')
        ]);
    }
}
