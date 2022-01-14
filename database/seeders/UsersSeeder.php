<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Kevin',
            'lastname' => 'Bright',
            'bDate' => '07.09.1992',
            'gender' => 'male',
            'role' => 'mate',
            'dicipline'=>'basketball',
            'email' => 'kevin@matefit.com',
            'password' => Hash::make('kevinkevin'),
            'credit' => 1000
        ]);

        \App\Models\User::create([
            'name' => 'youssef',
            'lastname' => 'Ben Abdallah',
            'bDate' => '19.06.1992',
            'gender' => 'male',
            'role' => 'mate',
            'dicipline'=>'joga',
            'email' => 'youssef@matefit.com',
            'password' => Hash::make('youssefyoussef'),
            'credit' => 1000
        ]);
        \App\Models\User::create([
            'name' => 'Yosri',
            'lastname' => 'Gam',
            'bDate' => '06.09.1992',
            'gender' => 'male',
            'dicipline'=>'boxing',
            'role' => 'mate',
            'email' => 'yosri@matefit.com',
            'password' => Hash::make('yosriyosri'),
            'credit' => 1000
        ]);

        \App\Models\User::create([
            'name' => 'JOHN',
            'lastname' => 'REED',
            'bDate' => '06.09.1992',
            'gender' => 'male',
            'role' => 'trainer',
            'dicipline'=>'street workout',
            'email' => 'trainer@matefit.com',
            'password' => Hash::make('trainertrainer'),
            'price' => 50,
            'credit' => 500
        ]);

        \App\Models\User::create([
            'name' => 'LARA',
            'lastname' => 'CRAFT',
            'bDate' => '06.09.1992',
            'gender' => 'female',
            'role' => 'trainer',
            'dicipline'=>'street workout',
            'email' => 'trainer2@matefit.com',
            'password' => Hash::make('trainertrainer'),
            'price' => 60,
            'credit' => 500
        ]);
    }
}
