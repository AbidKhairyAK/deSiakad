<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
    	'id_agama', 'nik', 'nuptk', 'nama', 'gender', 'foto', 'status'
    ];

    public function agama()
    {
    	return $this->belongsTo(Agama::class, 'id_agama');
    }

    public function akun()
    {
    	return $this->hasOne(Akun::class, 'id_guru');
    }

    public function rombel()
    {
        return $this->belongsToMany(Rombel::class, 'walikelas', 'id_guru', 'id_rombel');
    }
}
