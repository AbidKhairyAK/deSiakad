<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class WalikelasResource extends Resource
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
            "id"            => $this->id,
            "id_walikelas"  => $this->guru->first()['id'],
            "kode"          => $this->kode,
            "nama"          => $this->nama,
            "kelas"         => $this->kelas,
            "walikelas"     => $this->guru->first()['nama'],
        ];
    }
}
