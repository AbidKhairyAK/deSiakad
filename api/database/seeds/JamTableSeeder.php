<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class JamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $init = 7;

        for ($i=0; $i < 31; $i++) { 
            $add = floor($i / 2);
            $hour = intval($init + $add);
            $minute = $i % 2 ? ":30" : ":00";
            $prefix = $hour < 10 ? '0' : null;

            $data[$i] = [
                'pukul' => $prefix . $hour . $minute,
                'created_at' => $faker->date(),
                'updated_at' => $faker->date(),
            ];
        }

        DB::table('jam')->truncate();
        DB::table('jam')->insert($data);
    }
}
