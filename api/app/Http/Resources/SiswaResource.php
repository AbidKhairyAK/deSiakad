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
            'id_angkatan' => $this->id_angkatan,
            'id_agama' => $this->id_agama,
            'nis' => $this->nis,
            'nama' => $this->nama,
            'gender' => $this->gender,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'status' => $this->status,
            'foto' => $this->foto,
            'angkatan' => $this->angkatan->tahun,
            'agama' => $this->agama->nama,
        ];
    }
}
