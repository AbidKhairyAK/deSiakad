<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';

    protected $fillable = [
    	'kode', 'nama'
    ];

    // public function jadwal()
    // {
    // 	return $this->hasMany(Jadwal::class, 'id_mapel');
    // }

    // public function kurikulum_detail()
    // {
    // 	return $this->hasMany(KurikulumDetail::class, 'id_mapel');
    // }
}
