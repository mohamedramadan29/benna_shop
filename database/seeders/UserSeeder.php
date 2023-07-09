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
     */
    public function run(): void
    {
        DB::table('users')->delete(); // to not make any conflict if i need make seeder agaian
        DB::table('users')->insert([
            'name' => 'user',
            'email' =>'user@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
