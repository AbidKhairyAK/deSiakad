<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = 'rombel';

    protected $fillable = [
    	'kode', 'nama', 'kelas'
    ];

    public function jadwal()
    {
    	return $this->hasMany(Jadwal::class, 'id_rombel');
    }

    public function guru()
    {
    	return $this->belongsToMany(Guru::class, 'walikelas', 'id_rombel', 'id_guru');
    }

    public function siswa()
    {
    	return $this->hasMany(Siswa::class, 'id_rombel');
    }
}
