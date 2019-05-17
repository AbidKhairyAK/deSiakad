<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    protected $table = 'angkatan';

    protected $fillable = [
    	'tahun', 'nama'
    ];

    // public function siswa()
    // {
    // 	return $this->hasMany(Siswa::class, 'id_ruangan');
    // }
}
