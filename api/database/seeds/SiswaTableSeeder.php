<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i=0; $i < 100; $i++) {
            $tahun = rand(1,10);

            switch ($tahun) {
                case 5: $rombel = rand(1,2); break;
                case 6: $rombel = rand(3,4); break;
                case 7: $rombel = rand(5,6); break;
                case 8: $rombel = rand(7,8); break;
                case 9: $rombel = rand(9,10); break;
                case 10: $rombel = rand(11,12); break;
                default: $rombel = null; break;
            }

        	$data[$i] = [
                'id_rombel' => $rombel,
                'id_agama' => $faker->boolean(80) ?: rand(2,5),
        		'id_tahun_akademik' => $tahun,
        		'nim' => $faker->isbn10,
        		'nama' => $faker->name(),
        		'gender' => rand(0,1) ? 'L' : 'P',
        		'tanggal_lahir' => $faker->date(),
        		'tempat_lahir' => $faker->city,
        		'foto' => 'logo.png',
        		'created_at' => $faker->date(),
        		'updated_at' => $faker->date(),
        	];
        }

        DB::table('siswa')->truncate();
        DB::table('siswa')->insert($data);
    }
}
