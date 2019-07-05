<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class WalikelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('cs_CZ');
        $guru = app('db')->table('guru')->where('status', 1)->pluck('id');

        for ($i=1; $i <= 10; $i++) { 
        	$data[$i] = [
                'id_guru' => $faker->randomElement($guru),
                'id_rombel' => $i,
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('walikelas')->truncate();
        DB::table('walikelas')->insert($data);
    }
}
