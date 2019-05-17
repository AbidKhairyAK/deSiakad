<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class JadwalEditorResource extends Resource
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
            "id_mapel"      => $this->id_mapel, 
            "id_guru"       => $this->id_guru, 
            "id_ruangan"    => $this->id_ruangan, 
            "id_hari"       => $this->id_hari, 
            "rombel"        => $this->rombel->nama, 
            "kdmapel"       => $this->mapel->kode,
            "mapel"         => $this->mapel->nama,
            "guru"          => $this->id_guru,
            "ruangan"       => $this->ruangan ? $this->ruangan->nama : '-', 
            "hari"          => $this->hari->nama,
        ];
    }
}
