<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class JamPelajaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $jam = [
            '07:00-08:00', '08:00-09:00', '09:00-10:00', '10:00-11:00', '11:00-12:00', '12:00-13:00'
        ];

        for ($i=0; $i < 6; $i++) { 
        	$data[$i] = [
                'jam' => $jam[$i],
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('jam_pelajaran')->truncate();
        DB::table('jam_pelajaran')->insert($data);
    }
}
