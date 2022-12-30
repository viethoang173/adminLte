<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();
        $limit = 2;

        for ($i = 1; $i <= $limit; $i++) {
            DB::table('roles')->insert([
                'name' => $fake->name
            ]);
        }
    }
}
