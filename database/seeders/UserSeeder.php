<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Nelson Reyes',
                'email' => 'eliasoficialbunnises@gmail.com',
                'password' => Hash::make('Nelsonreyes5$'),
                'rol' => 1

            ],
            [
                'name' => 'Elias',
                'email' => 'eliasoficialbunnises1@gmail.com',
                'password' => Hash::make('Nelsonreyes5$'),
                'rol' => 0

            ]

        ]);
    }
}
