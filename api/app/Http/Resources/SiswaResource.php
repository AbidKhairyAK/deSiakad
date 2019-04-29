<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SiswaResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_rombel' => $this->id_rombel,
            'id_agama' => $this->id_agama,
            'id_tahun_akademik' => $this->id_tahun_akademik,
            'nim' => $this->nim,
            'nama' => $this->nama,
            'gender' => $this->gender,
            'full_gender' => $this->gender == 'L' ? 'Laki-laki' : 'Perempuan',
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'foto' => $this->foto,
            'rombel' => $this->rombel->nama,
            'agama' => $this->agama->nama,
            'tahun_akademik' => $this->tahun_akademik->tahun
        ];
    }
}
