<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Angkatan;
use App\Http\Resources\AngkatanResource;

class AngkatanController extends Controller
{
    public function list()
    {
    	$angkatan = app('db')->table('angkatan')->orderBy('tahun', 'desc')->get();

    	return response()->json($angkatan);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

        $angkatan = Angkatan::orderBy('tahun', 'desc');

        if (!empty($status) || $status === '0') {
            $filter[] = [ 'status', '=', $status];
        }

        if (isset($filter)) {
            $angkatan = $angkatan->where($filter);
        }

        if (!empty($search)) {
            $angkatan = $angkatan->where('tahun', 'like', "%$search%");
        }

        $angkatan = $angkatan->paginate(15);

        return AngkatanResource::collection($angkatan);
    }

    public function create(Request $request)
    {
        $angkatan = Angkatan::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $angkatan = Angkatan::find($id)->update($request->all());
    }

    public function destroy($id)
    {
    	Angkatan::find($id)->delete();
    }
}
