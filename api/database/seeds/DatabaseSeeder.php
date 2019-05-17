<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call('MenuTableSeeder');
        $this->call('AgamaTableSeeder');
        $this->call('SiswaTableSeeder');
        $this->call('MapelTableSeeder');
        $this->call('JamTableSeeder');
        $this->call('HariTableSeeder');
        $this->call('RuanganTableSeeder');
        $this->call('AngkatanTableSeeder');
        $this->call('TahunAkademikTableSeeder');
        $this->call('KurikulumTableSeeder');
        $this->call('KurikulumDetailTableSeeder');
        $this->call('SekolahTableSeeder');
        $this->call('GuruTableSeeder');
        $this->call('JadwalTableSeeder');
        $this->call('RombelTableSeeder');
        $this->call('WalikelasTableSeeder');
        $this->call('PenggunaTableSeeder');
    
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
