<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i<=5 ; $i++) { 
            DB::table('students')->insert([
                'name'=> $faker->name,
                'score'=> $faker->numberBetween(0,100)
            ]
            );
        }
    }
}
