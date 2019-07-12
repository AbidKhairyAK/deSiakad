<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class JadwalResource extends Resource
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
            "id"                => $this->id,
            "id_rombel"         => $this->id_rombel,
            "id_mapel"          => $this->id_mapel,
            "id_guru"           => $this->id_guru,
            "id_ruangan"        => $this->id_ruangan,
            "id_jam_mulai"      => $this->id_jam_mulai,
            "id_jam_selesai"    => $this->id_jam_selesai,
            "id_hari"           => $this->id_hari,
            "rombel"            => $this->rombel ? $this->rombel->nama : '-',
            "mapel"             => $this->mapel ? $this->mapel->nama : '-',
            "guru"              => $this->guru ? $this->guru->nama : '-',
            "ruangan"           => $this->ruangan ? $this->ruangan->nama : '-',
            "jam_mulai"         => $this->jam_mulai ? $this->jam_mulai->pukul : '-',
            "jam_selesai"       => $this->jam_selesai ? $this->jam_selesai->pukul : '-',
            "hari"              => $this->hari ? $this->hari->nama : '-',
        ];
    }
}
