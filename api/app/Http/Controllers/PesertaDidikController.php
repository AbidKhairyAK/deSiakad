<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Siswa;
use App\Model\Rombel;
use App\Http\Resources\PesertaDidikResource;
use App\Http\Resources\SiswaResource;

class PesertaDidikController extends Controller
{
    public function index(Request $request)
    {
        $rombel = $request->get('rombel');
        $agama = $request->get('agama');
        $gender = $request->get('gender');
        $search = $request->get('search');

        $siswa = Siswa::with(['rombel', 'agama', 'angkatan'])
            ->orderBy('id_rombel')->orderBy('nama')
            ->has('rombel');

        if (!empty($rombel)) {
            $filter[] = [ 'id_rombel', '=', $rombel];
        }
        if (!empty($agama)) {
            $filter[] = [ 'id_agama', '=', $agama];
        }
        if (!empty($gender)) {
            $filter[] = [ 'gender', '=', $gender];
        }

        if (isset($filter)) {
            $siswa = $siswa->where($filter);
        }

        if (!empty($search)) {
            $siswa = $siswa->where(function($query) use ($search) {
                $query->where('nis', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%")
                    ->orWhere('tempat_lahir', 'like', "%$search%")
                    ->orWhere('tanggal_lahir', 'like', "%$search%")

                    ->orWhereHas('rombel', function($query) use ($search) {
                        $query->where('nama', 'like', "%$search%");
                    })
                    ->orWhereHas('agama', function($query) use ($search) {
                        $query->where('nama', 'like', "%$search%");
                    })
                    ->orWhereHas('angkatan', function($query) use ($search) {
                        $query->where('tahun', 'like', "%$search%");
                    });
            });
        }
            
        $siswa = $siswa->paginate(15);

        return PesertaDidikResource::collection($siswa);
    }

    public function punya_rombel(Request $request)
    {
        $rombel = $request->get('rombel');
        $search = $request->get('search');

        $siswa = Siswa::with('rombel')->orderBy('nama')->has('rombel');

        if (!empty($rombel)) {
            $filter[] = [ 'id_rombel', '=', $rombel];
        }

        if (isset($filter)) {
            $siswa = $siswa->where($filter);
        }

        if (!empty($search)) {
            $siswa = $siswa->where(function($query) use ($search) {
                $query->where('nis', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%");
            });
        }
            
        $siswa = $siswa->paginate(10);

        return PesertaDidikResource::collection($siswa);
    }

    public function semua_siswa(Request $request)
    {
        $angkatan = $request->get('angkatan');
        $search = $request->get('search');

        $siswa = Siswa::with('angkatan')->orderBy('id_angkatan', 'desc')->orderBy('nama');

        if (!empty($angkatan)) {
            $filter[] = [ 'id_angkatan', '=', $angkatan];
        }

        if (isset($filter)) {
            $siswa = $siswa->where($filter);
        }

        if (!empty($search)) {
            $siswa = $siswa->where(function($query) use ($search) {
                $query->where('nis', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%");
            });
        }
            
        $siswa = $siswa->paginate(10);

        // return $siswa;
        return PesertaDidikResource::collection($siswa);
    }

    public function push(Request $request)
    {
        Siswa::find($request->id)->update(['id_rombel' => $request->id_rombel]);
    }

    public function pop(Request $request)
    {
        Siswa::find($request->id)->update(['id_rombel' => null]);
    }
}
