<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ruangan;
use App\Http\Resources\RuanganResource;

class RuanganController extends Controller
{
    public function list()
    {
        $ruangan = app('db')->table('ruangan')->get();

        return response()->json($ruangan);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $ruangan = Ruangan::orderBy('kode');

        if (!empty($search)) {
            $ruangan = $ruangan->where('kode', 'like', "%$search%")
                    			->orWhere('nama', 'like', "%$search%");
        }

        $ruangan = $ruangan->paginate(15);

        return RuanganResource::collection($ruangan);
    }

    public function create(Request $request)
    {
        $ruangan = Ruangan::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $ruangan = Ruangan::find($id)->update($request->all());
    }

    public function destroy($id)
    {
    	Ruangan::find($id)->delete();
    }
}
