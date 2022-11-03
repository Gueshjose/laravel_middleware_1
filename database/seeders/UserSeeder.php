<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Jojo',
                'email'=>"jojo@gmail.com",
                'password'=>Hash::make('jojo@gmail.com'),
                'role_id'=> 1
            ],
            [
                'name'=>'Jo',
                'email'=>"jojo2@gmail.com",
                'password'=>Hash::make('jojo2@gmail.com'),
                'role_id'=> 3
            ],
            [
                'name'=>'Jojojo',
                'email'=>"jojo3@gmail.com",
                'password'=>Hash::make('jojo3@gmail.com'),
                'role_id'=> 2
            ],
            [
                'name'=>'Jony',
                'email'=>"jojo4@gmail.com",
                'password'=>Hash::make('jojo4@gmail.com'),
                'role_id'=> 4
            ],
        ]);
    }
}
