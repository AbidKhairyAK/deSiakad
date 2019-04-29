<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class JadwalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($semester=1; $semester <= 2; $semester++) { 
            for ($rombel=1; $rombel <= 10; $rombel++) { 
                for ($hari=1; $hari <= 7; $hari++) { 
                    for ($jam=1; $jam <= 6; $jam++) { 
                    	$data[] = [
                            'id_rombel' => $rombel,
                            'id_mapel' => rand(1, 10),
                            'id_guru' => rand(1, 10),
                            'id_ruangan' => $rombel,
                            'id_jam_pelajaran' => $jam,
                            'hari' => $hari,
                            'semester' => $semester,
                    		'created_at' => $faker->date(),
                    		'updated_at' => $faker->date(),
                    	];
                    }
                }
            }
        }


        DB::table('jadwal')->truncate();
        DB::table('jadwal')->insert($data);
    }
}
