<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kurikulum;
use App\Http\Resources\KurikulumResource;

class KurikulumController extends Controller
{
    public function list()
    {
    	$kurikulum = app('db')->table('kurikulum')->get();

    	return response()->json($kurikulum);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

        $kurikulum = Kurikulum::orderBy('nama', 'desc');

        if (!empty($status)) {
            $filter[] = [ 'status', '=', $status];
        }

        if (isset($filter)) {
            $kurikulum = $kurikulum->where($filter);
        }

        if (!empty($search)) {
            $kurikulum = $kurikulum->where('nama', 'like', "%$search%")
                    				->orWhere('status', 'like', "%$search%");
        }

        $kurikulum = $kurikulum->paginate(15);

        return KurikulumResource::collection($kurikulum);
    }

    public function create(Request $request)
    {
        $kurikulum = Kurikulum::create($request->all());

        return response()->json(['id' => $kurikulum->id]);
    }

    public function update(Request $request, $id)
    {
        $kurikulum = Kurikulum::find($id)->update($request->all());

        return response()->json(['id' => $id]);
    }

    public function destroy($id)
    {
    	Kurikulum::find($id)->delete();
    }
}
