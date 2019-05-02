<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';

    protected $fillable = [
    	'kode', 'nama'
    ];

    // public function jadwal()
    // {
    // 	return $this->hasMany(Jadwal::class, 'id_ruangan');
    // }
}
