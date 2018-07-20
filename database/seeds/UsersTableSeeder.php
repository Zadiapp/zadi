<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Ahmed Alawady',
            'email' => 'ahmed.alawady@gmail.com',
            'password' => '123456789',
        ]);
    }
}
