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
            'name' => 'Farhan',
            'email' => 'farhan.sunday@gmail.com',
            'password' => bcrypt('kaskus'),
    	]);
    }
}
