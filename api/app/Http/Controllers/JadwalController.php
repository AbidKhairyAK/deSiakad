<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Jadwal;
use App\Http\Resources\JadwalResource;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $rombel = $request->get('rombel');
        $mapel = $request->get('mapel');
        $guru = $request->get('guru');
        $ruangan = $request->get('ruangan');
        $jam = $request->get('jam');
        $hari = $request->get('hari');
        $search = $request->get('search');

        $jadwal = Jadwal::with(['rombel', 'mapel', 'guru', 'ruangan', 'jam_mulai', 'hari', ])
            ->orderBy('id_rombel')->orderBy('id_hari')->orderBy('id_jam_mulai');

        if (!empty($rombel)) { $filter[] = [ 'id_rombel', '=', $rombel]; }
        if (!empty($mapel)) { $filter[] = [ 'id_mapel', '=', $mapel]; }
        if (!empty($guru)) { $filter[] = [ 'id_guru', '=', $guru]; }
        if (!empty($ruangan)) { $filter[] = [ 'id_ruangan', '=', $ruangan]; }
        if (!empty($hari)) { $filter[] = [ 'id_hari', '=', $hari]; }
        if (!empty($jam)) { $filter[] = [ 'id_jam_mulai', '=', $jam]; }

        if (isset($filter)) { $jadwal = $jadwal->where($filter); }

        if (!empty($search)) {
            $jadwal = $jadwal->whereHas('rombel', function($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->orWhereHas('mapel', function($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->orWhereHas('guru', function($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->orWhereHas('ruangan', function($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->orWhereHas('hari', function($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->orWhereHas('jam_mulai', function($query) use ($search) {
                $query->where('pukul', 'like', "%$search%");
            });
        }
            
        $jadwal = $jadwal->paginate(15);

        return JadwalResource::collection($jadwal);
    }

    public function create(Request $request)
    {
        $jadwal = Jadwal::create($request->all());

        return response()->json(['id' => $jadwal->id]);
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::find($id)->update($request->all());

        return response()->json(['id' => $id]);
    }

    public function destroy($id)
    {
    	$jadwal = Jadwal::find($id);

        $jadwal->delete();
    }
}
