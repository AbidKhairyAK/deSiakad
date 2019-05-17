<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Mapel;
use App\Http\Resources\MapelResource;

class MapelController extends Controller
{
    public function list()
    {
        $mapel = app('db')->table('mapel')->get();

        return response()->json($mapel);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $mapel = Mapel::orderBy('kode');

        if (!empty($search)) {
            $mapel = $mapel->where('kode', 'like', "%$search%")
                    			->orWhere('nama', 'like', "%$search%");
        }

        $mapel = $mapel->paginate(15);

        return MapelResource::collection($mapel);
    }

    public function create(Request $request)
    {
        $mapel = Mapel::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $mapel = Mapel::find($id)->update($request->all());
    }

    public function destroy($id)
    {
    	Mapel::find($id)->delete();
    }
}
