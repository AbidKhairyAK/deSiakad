<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class RuanganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $ruangan = [
            'Ruang 1A',
            'Ruang 1B',
            'Ruang 2A',
            'Ruang 2B',
            'Ruang 2C',
            'Ruang 3A',
            'Ruang 3B',
            'Ruang 4A',
            'Ruang 5A',
            'Ruang 6A',
            'Ruang Kepala Sekolah',
            'Kantor',
            'Laboratorium',
            'Perpustakaan',
            'Lapangan',
            'Aula',
        ];
        $kode = [
            'R1A', 'R1B', 'R2A', 'R2B', 'R2C', 'R3A', 'R3B', 'R4A', 'R5A', 'R6A', 'RKEPSEK', 'KNTR', 'LAB', 'PERPUS', 'LAP', 'AULA'
        ];

        for ($i=0; $i < 10; $i++) { 
        	$data[$i] = [
                'kode' => $kode[$i],
                'nama' => $ruangan[$i],
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('ruangan')->truncate();
        DB::table('ruangan')->insert($data);
    }
}
