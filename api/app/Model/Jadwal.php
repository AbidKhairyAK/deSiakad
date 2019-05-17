<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
    	'id_rombel', 'id_mapel', 'id_guru', 'id_ruangan', 'id_jam_mulai', 'id_jam_selesai', 'id_hari'
    ];

    public function rombel()
    {
    	return $this->belongsTo(Rombel::class, 'id_rombel');
    }

    public function mapel()
    {
    	return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }

    public function hari()
    {
        return $this->belongsTo(Hari::class, 'id_hari');
    }

    public function jam_mulai()
    {
    	return $this->belongsTo(Jam::class, 'id_jam_mulai');
    }

    public function jam_selesai()
    {
    	return $this->belongsTo(Jam::class, 'id_jam_selesai');
    }
}
