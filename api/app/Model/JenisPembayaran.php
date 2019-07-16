<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JenisPembayaran extends Model
{
    protected $table = 'jenis_pembayaran';

    protected $fillable = [
    	'kode', 'nama'
    ];
}
