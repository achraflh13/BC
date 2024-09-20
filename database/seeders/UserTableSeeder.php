<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            //admin
            [
                        'name'=>'Admin',
                        'username'=>'admin',
                        'email'=>'admin@gmail.com',
                        'password'=>Hash::make('123'),
                        'role'=>'admin',
                        'status'=>'active',
            ],
             //agent
                 //admin
            [
                'name'=>'Agent',
                'username'=>'agent',
                'email'=>'agent@gmail.com',
                'password'=>Hash::make('123'),
                'role'=>'agent',
                'status'=>'active',
    ],
    //user
        //admin
        [
            'name'=>'User',
            'username'=>'user',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('123'),
            'role'=>'user',
            'status'=>'active',
],


        ]);
    }
}