<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' =>1, 'name' => 'Jimmy', 'score' => 90],
            ['id' =>2, 'name' => 'Udin', 'score' => 80],
            ['id' =>3, 'name' => 'Putra', 'score' => 98],
        ];

        DB::table('students')->insert($data);
    }

}
