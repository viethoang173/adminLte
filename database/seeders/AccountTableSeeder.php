<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTableSeeder extends Seeder
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
        // Create role from enums.
        $reflector = new \ReflectionClass('App\Enums\GenderEnum');
        foreach ( $reflector->getConstants() as $constValue ) {
            $genders[] = $constValue;
        }

        $reflector = new \ReflectionClass('App\Enums\UserStatusEnum');
        foreach ( $reflector->getConstants() as $constValue ) {
            $status[] = $constValue;
        }

        for ($i = 1; $i < $limit; $i++) {
            $ran = rand(0, count($genders)-1);
            $mua = rand(0, count($status)-1);
            DB::table('accounts')->insert([
                'name' => $fake->name,
                'gender' => $genders[$ran],
                'email' => 	$fake->unique->email,
                'phone' => $fake->numerify($string = '#############'),
                'address' => $fake->city,
                'roles_id' => $fake->numberBetween($min = 1, $max = 2),
                'status' => $status[$mua],
                'password' => $fake->word
            ]);
        }
    }
}
