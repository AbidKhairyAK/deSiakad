<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    protected $table = 'jam';

    protected $fillable = [
    	'pukul'
    ];

    public function jadwal()
    {
    	return $this->hasMany(Jadwal::class, 'id_jam_mulai');
    }
}
