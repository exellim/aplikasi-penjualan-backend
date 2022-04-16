<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            ['name' => 'exel',
            'email' => 'exel@gmail.com',
            'password' => Hash::make('12345678'),
            'img_url' => 'exel.jpg',
            'phone' => 'exel@gmail.com',
            'address' => 'Surabaya',
            'emp_number' => 'KM-0001'],

            ['name' => 'aya',
            'email' => 'aya@gmail.com',
            'password' => Hash::make('12345678'),
            'img_url' => 'aya.jpg',
            'phone' => 'exel@gmail.com',
            'address' => 'Surabaya',
            'emp_number' => 'KM-0002'],
        ]);
    }
}
