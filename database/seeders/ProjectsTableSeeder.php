<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Faker\Factory;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();
        $limit = 20;

        for ($i = 1; $i < $limit; $i++) {
            DB::table('projects')->insert([
                'name' => $fake->name,
                'description' => $fake->sentence,
                'status_id' => $fake->numberBetween($min = 1, $max = 2),
                'client_company' => $fake->name,
                'leader' => $fake->name
            ]);
        }
    }
}
