<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            // Parents
        	[
        		'nama' => 'Data Master',
        		'link' => '#',
                'icon' => 'fa-bars',
                'submenu' => 0
            ],
            [
                'nama' => 'Data Siswa',
                'link' => '#',
                'icon' => 'fa-users',
                'submenu' => 0
            ],
            [
                'nama' => 'Data Guru',
                'link' => '#',
                'icon' => 'fa-graduation-cap',
                'submenu' => 0
            ],

            // Independents
            [
                'nama' => 'Data Sekolah',
                'link' => '/sekolah',
                'icon' => 'fa-building',
                'submenu' => 0
            ],
        	[
        		'nama' => 'Jadwal Pelajaran',
        		'link' => '/jadwal',
        		'icon' => 'fa-calendar',
        		'submenu' => 0
        	],
        	[
        		'nama' => 'Laporan Nilai',
        		'link' => '/laporan',
        		'icon' => 'fa-file-excel',
        		'submenu' => 0
        	],
        	[
        		'nama' => 'Pengguna Sistem',
        		'link' => '/pengguna',
        		'icon' => 'fa-cubes',
        		'submenu' => 0
        	],

            // Childs
            [
                'nama' => 'Mata Pelajaran',
                'link' => '/mapel',
                'icon' => 'fa-book',
                'submenu' => 1
            ],
            [
                'nama' => 'Ruangan Kelas',
                'link' => '/ruangan',
                'icon' => 'fa-building',
                'submenu' => 1
            ],
            [
                'nama' => 'Jurusan',
                'link' => '/jurusan',
                'icon' => 'fa-th-large',
                'submenu' => 1
            ],
            [
                'nama' => 'Tahun Akademik',
                'link' => '/tahun-akademik',
                'icon' => 'fa-calendar-alt',
                'submenu' => 1
            ],
            [
                'nama' => 'Rombongan Belajar',
                'link' => '/rombel',
                'icon' => 'fa-users',
                'submenu' => 1
            ],
            [
                'nama' => 'Kurikulum',
                'link' => '/kurikulum',
                'icon' => 'fa-newspaper',
                'submenu' => 1
            ],
            [
                'nama' => 'Daftar Siswa',
                'link' => '/siswa',
                'icon' => 'fa-users',
                'submenu' => 2
            ],
            [
                'nama' => 'Peserta Didik',
                'link' => '/peserta-didik',
                'icon' => 'fa-pencil-alt',
                'submenu' => 2
            ],
            [
                'nama' => 'Daftar Guru',
                'link' => '/guru',
                'icon' => 'fa-graduation-cap',
                'submenu' => 3
            ],
            [
                'nama' => 'Wali Kelas',
                'link' => '/walikelas',
                'icon' => 'fa-users',
                'submenu' => 3
            ],
        ];

        DB::table('menu')->truncate();
        DB::table('menu')->insert($data);
    }
}
