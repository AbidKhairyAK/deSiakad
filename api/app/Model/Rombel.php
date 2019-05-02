<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = 'rombel';

    protected $fillable = [
    	'kode', 'nama', 'kelas'
    ];

    // public function jadwal()
    // {
    // 	return $this->hasMany(Jadwal::class, 'id_rombel');
    // }

    // public function walikelas()
    // {
    // 	return $this->hasMany(Walikelas::class, 'id_rombel');
    // }

    // public function siswa()
    // {
    // 	return $this->hasMany(Siswa::class, 'id_rombel');
    // }
}
