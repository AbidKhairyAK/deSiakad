<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class GuruResource extends Resource
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
            "id"        => $this->id,
            "id_agama"  => $this->id_agama,
            "nik"       => $this->nik,
            "nuptk"     => $this->nuptk,
            "nama"      => $this->nama,
            "gender"    => $this->gender,
            "foto"      => $this->foto,
            "status"    => $this->status,
            "agama"     => $this->agama->nama,
        ];
    }
}
