<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PembayaranResource extends Resource
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
            'id_siswa' => $this->id_siswa,
            'id_jenis_pembayaran' => $this->id_jenis_pembayaran,
            'tanggal' => $this->tanggal,
            'jumlah' => "Rp. " . number_format($this->jumlah, 0, ',', '.'),
            'keterangan' => $this->keterangan,
            'siswa' => $this->siswa->nama,
            'kode_jenis' => $this->jenis_pembayaran->kode,
            'nama_jenis' => $this->jenis_pembayaran->nama,
        ];
    }
}
