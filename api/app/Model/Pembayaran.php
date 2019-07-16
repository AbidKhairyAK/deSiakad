<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
    	'id_siswa', 'id_jenis_pembayaran', 'tanggal', 'jumlah', 'keterangan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function jenis_pembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class, 'id_jenis_pembayaran');
    }

    // public function kurikulum_detail()
    // {
    // 	return $this->hasMany(KurikulumDetail::class, 'id_mapel');
    // }
}
