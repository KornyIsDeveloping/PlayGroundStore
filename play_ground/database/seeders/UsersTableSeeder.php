<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => Str::uuid()->toString(),
                'first_name' => 'Ejiro',
                'last_name' => 'Mass',
                'email' => 'ejiro@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => Str::uuid()->toString(),
                'first_name' => 'Luxor',
                'last_name' => 'Ramazan',
                'email' => 'luxor@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => Str::uuid()->toString(),
                'first_name' => 'Kaarina',
                'last_name' => 'Mandi',
                'email' => 'kaarina@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => Str::uuid()->toString(),
                'first_name' => 'Kornuletz',
                'last_name' => 'k',
                'email' => 'korny@example.com',
                'password' => Hash::make('123456'),
            ],
        ]);
    }
}
