<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = 'rombel';

    protected $fillable = [
    	'kode', 'nama', 'kelas'
    ];
}
