<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PesertaDidikResource extends Resource
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
            'id_angkatan' => $this->id_angkatan,
            'id_agama' => $this->id_agama,
            'id_rombel' => $this->id_rombel,
            'nis' => $this->nis,
            'nama' => $this->nama,
            'gender' => $this->gender,
            'full_gender' => $this->gender == 'L' ? 'Laki-laki' : 'Perempuan',
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'foto' => $this->foto,
            'angkatan' => $this->angkatan->tahun,
            'agama' => $this->agama->nama,
            'rombel' => $this->id_rombel ? $this->rombel->nama : null,
        ];
    }
}
