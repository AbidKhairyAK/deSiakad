<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
    	'id_rombel','id_angkatan', 'id_agama', 'nis', 'nama', 'gender', 'tanggal_lahir', 'tempat_lahir', 'foto'
    ];

    public function rombel()
    {
    	return $this->belongsTo(Rombel::class, 'id_rombel');
    }

    public function agama()
    {
    	return $this->belongsTo(Agama::class, 'id_agama');
    }

    public function angkatan()
    {
    	return $this->belongsTo(Angkatan::class, 'id_angkatan');
    }
}
