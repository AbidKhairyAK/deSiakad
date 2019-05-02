<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TahunAkademik;
use App\Http\Resources\TahunAkademikResource;

class TahunAkademikController extends Controller
{
    public function list()
    {
    	$tahun_akademik = app('db')->table('tahun_akademik')->get();

    	return response()->json($tahun_akademik);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

        $tahun_akademik = TahunAkademik::orderBy('tahun', 'desc');

        if (!empty($status)) {
            $filter[] = [ 'status', '=', $status];
        }

        if (isset($filter)) {
            $tahun_akademik = $tahun_akademik->where($filter);
        }

        if (!empty($search)) {
            $tahun_akademik = $tahun_akademik->where('tahun', 'like', "%$search%")
                    						->orWhere('status', 'like', "%$search%");
        }

        $tahun_akademik = $tahun_akademik->paginate(15);

        return TahunAkademikResource::collection($tahun_akademik);
    }

    public function create(Request $request)
    {
        $tahun_akademik = TahunAkademik::create($request->all());

        return response()->json(['id' => $tahun_akademik->id]);
    }

    public function update(Request $request, $id)
    {
        $tahun_akademik = TahunAkademik::find($id)->update($request->all());

        return response()->json(['id' => $id]);
    }

    public function destroy($id)
    {
    	TahunAkademik::find($id)->delete();
    }
}
