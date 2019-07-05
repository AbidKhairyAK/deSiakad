<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Rombel;
use App\Http\Resources\WalikelasResource;

class WalikelasController extends Controller
{
    public function index(Request $request)
    {
        $kelas = $request->get('kelas');
        $search = $request->get('search');

        $rombel = Rombel::with('guru')
            ->orderBy('nama');

        if (!empty($kelas)) {
            $filter[] = [ 'kelas', '=', $kelas];
        }

        if (isset($filter)) {
            $rombel = $rombel->where($filter);
        }

        if (!empty($search)) {
            $rombel = $rombel->whereHas('guru', function($query) use ($search) {
                $query->where('nik', 'like', "%$search%")
                    ->orWhere('nuptk', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%");
            })
            ->orWhere(function($query) use ($search) {
                $query->where('kode', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%")
                    ->orWhere('kelas', 'like', "%$search%");
            });
        }
            
        $rombel = $rombel->paginate(15);

        return WalikelasResource::collection($rombel);
    }

    public function sync(Request $request)
    {
    	$rombel = Rombel::find($request->id_rombel)->guru();

        if ($request->id_guru == null) {
            $rombel->detach();
        } else {
            $rombel->sync($request->id_guru);
        }
    }
}
