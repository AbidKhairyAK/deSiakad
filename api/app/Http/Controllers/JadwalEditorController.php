<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Jam;
use App\Model\Jadwal;
use App\Http\Resources\JamJadwalResource;

class JadwalEditorController extends Controller
{
    public function index(Request $request)
    {
        $rombel = $request->get('rombel');

        $data = Jam::with(['jadwal' => function ($query) use ($rombel) {
                    $query->with(['rombel', 'mapel', 'ruangan', 
                            'jam_mulai', 'jam_selesai'])
                        ->where('id_rombel', $rombel)
                        ->orderBy('id_hari');
                }])->whereHas('jadwal', function ($query) use ($rombel) {
                    $query->where('id_rombel', $rombel);
                })->get();

        return JamJadwalResource::collection($data);
    }

    public function save(Request $request)
    {
        $this->destroy($request);
        
        foreach($request->jadwal as $data) {
            $jadwal                 = new Jadwal();
            $jadwal->id_rombel      = $request->id_rombel;
            $jadwal->id_jam_mulai   = $request->id_jam_mulai;
            $jadwal->id_jam_selesai = $request->id_jam_selesai;
            $jadwal->id_mapel       = $data['id_mapel'];
            $jadwal->id_guru        = !empty($data['id_guru']) ? $data['id_guru'] : null;
            $jadwal->id_ruangan        = !empty($data['id_ruangan']) ? $data['id_ruangan'] : null;
            $jadwal->id_hari        = $data['id_hari'];
            $jadwal->save();
        }
    }

    public function destroy(Request $request)
    {
        Jadwal::where('id_rombel', $request->id_rombel)
                ->where('id_jam_mulai', $request->old_jam_mulai)
                ->where('id_jam_selesai', $request->old_jam_selesai)
                ->delete();
    }
}
