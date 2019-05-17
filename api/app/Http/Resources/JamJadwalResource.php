<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class JamJadwalResource extends Resource
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
            'id'                => $this->id,
            'id_rombel'         => $this->jadwal->first()->id_rombel,
            'id_jam_mulai'      => $this->jadwal->first()->id_jam_mulai,
            'id_jam_selesai'    => $this->jadwal->first()->id_jam_selesai,
            'jam_mulai'         => $this->jadwal->first()->jam_mulai->pukul,
            'jam_selesai'       => $this->jadwal->first()->jam_selesai->pukul,
            'jadwal'            => JadwalEditorResource::collection($this->jadwal),
        ];
    }
}
