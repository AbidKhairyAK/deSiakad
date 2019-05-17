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

        for ($rombel=1; $rombel <= 10; $rombel++) { 
            for ($hari=1; $hari <= 6; $hari++) { 
                for ($jam=1; $jam <= 13; $jam++) {
                    if ($jam % 2) {
                        $data[] = [
                            'id_rombel' => $rombel,
                            'id_mapel' => $jam == 5 || $jam == 11 ? 1 : rand(2, 10),
                            'id_guru' => $jam == 5 || $jam == 11 ? null : rand(1, 10),
                            'id_ruangan' => $jam == 5 || $jam == 11 ? null : $rombel,
                            'id_jam_mulai' => $jam,
                            'id_jam_selesai' => $jam + 2,
                            'id_hari' => $hari,
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
