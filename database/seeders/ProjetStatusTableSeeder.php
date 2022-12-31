<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();
        $limit = 3;

        $reflector = new \ReflectionClass('App\Enums\ProjectStatusEnum');
        foreach ($reflector->getConstants() as $constValue){
            $sta[] = $constValue;
        }

        for ($i = 1; $i < $limit; $i++) {
            $ran = rand(0,count($sta)-1);
            DB::table('project_statuses')->insert([
                'name' => $sta[$ran]
            ]);
        }
    }
}
