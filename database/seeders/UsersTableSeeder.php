<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'middle_name' => 'Doe',
                'last_name' => 'Doe',
                'role' => 0,
                'course' => 0,
                'username' => 'adminone',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Duman',
                'middle_name' => 'Doe',
                'last_name' => 'Doe',
                'role' => 0,
                'course' => 0,
                'username' => 'admintwo',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'last_name' => $faker->lastName,
                'role' => 1,
                'course' => 0,
                'username' => 'employerone',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'last_name' => $faker->lastName,
                'role' => 3,
                'course' => 1,
                'username' => 'studentone',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'last_name' => $faker->lastName,
                'role' => 3,
                'course' => 2,
                'username' => 'studenttwo',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'last_name' => $faker->lastName,
                'role' => 3,
                'course' => 3,
                'username' => 'studentthree',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('intern_handlers')->insert([
            [
               'user_id' => 4,
               'coord_id' => 1,
            ],
            [
                'user_id' => 5,
                'coord_id' => 1,
            ],
            [
                'user_id' => 6,
                'coord_id' => 1,
            ],
        ]);

    }
}
