<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table = 'kurikulum';
    
    protected $fillable = [
    	'nama', 'status'
    ];

    // public function kurikulum_detail()
    // {
    // 	return $this->hasMany(KurikulumDetail::class, 'id_kurikulum');
    // }
}
