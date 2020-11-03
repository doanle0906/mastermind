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
        DB::table('users')->insert([
            "name" => "MasterMind",
            "password" => bcrypt("M@sterMine2019!"),
            "email" => "admin@mastermind.com",
            "role" => "admin"
        ]);
        DB::table('users')->insert([
            "name" => "MB",
            "password" => bcrypt("M@b2019!"),
            "email" => "mb@mastermind.com",
            "role" => "user"
        ]);
    }
}
