<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class RombelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('cs_CZ');
        $rombel = [
            'Kelas 1A',
            'Kelas 1B',
            'Kelas 2A',
            'Kelas 2B',
            'Kelas 3A',
            'Kelas 3B',
            'Kelas 4A',
            'Kelas 4B',
            'Kelas 5A',
            'Kelas 5B',
            'Kelas 6A',
            'Kelas 6B'
        ];
        $kode = [
            'K1A', 'K1B', 'K2A', 'K2B', 'K3A', 'K3B', 'K4A', 'K4B', 'K5A', 'K5B', 'K6A', 'K6B'
        ];
        $kelas = [
            '1', '1', '2', '2', '3', '3', '4', '4', '5', '5', '6', '6'
        ];

        for ($i=0; $i < 12; $i++) { 
        	$data[$i] = [
                'kode' => $kode[$i],
                'nama' => $rombel[$i],
                'kelas' => $kelas[$i],
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('rombel')->truncate();
        DB::table('rombel')->insert($data);
    }
}
