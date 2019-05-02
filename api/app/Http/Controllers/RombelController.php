<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Rombel;
use App\Http\Resources\RombelResource;

class RombelController extends Controller
{
    public function list()
    {
    	$rombel = app('db')->table('rombel')->get();

    	return response()->json($rombel);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $rombel = Rombel::orderBy('kode');

        if (!empty($search)) {
            $rombel = $rombel->where('kode', 'like', "%$search%")
                    			->orWhere('nama', 'like', "%$search%")
                    			->orWhere('kelas', 'like', "%$search%");
        }

        $rombel = $rombel->paginate(15);

        return RombelResource::collection($rombel);
    }

    public function create(Request $request)
    {
        $rombel = Rombel::create($request->all());

        return response()->json(['id' => $rombel->id]);
    }

    public function update(Request $request, $id)
    {
        $rombel = Rombel::find($id)->update($request->all());

        return response()->json(['id' => $id]);
    }

    public function destroy($id)
    {
    	Rombel::find($id)->delete();
    }
}
