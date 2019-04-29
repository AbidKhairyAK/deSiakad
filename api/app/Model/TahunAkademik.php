<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'tahun_akademik';
    
    protected $fillable = [
    	'tahun', 'status'
    ];
}
