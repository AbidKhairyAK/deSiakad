<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'tahun_akademik';
    
    protected $fillable = [
    	'tahun', 'status'
    ];

    // public function walikelas()
    // {
    // 	return $this->hasMany(Walikelas::class, 'id_tahun_akademik');
    // }

    // public function Jadwal()
    // {
    // 	return $this->hasMany(Jadwal::class, 'id_tahun_akademik');
    // }
}
