<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'middle_name' => 'Doe',
                'last_name' => 'Doe',
                'role' => 0,
                'username' => 'adminwan',
                'password' => bcrypt('admin'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Duman',
                'middle_name' => 'Doe',
                'last_name' => 'Doe',
                'role' => 0,
                'username' => 'admintwo',
                'password' => bcrypt('admin'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
