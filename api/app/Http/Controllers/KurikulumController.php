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

        if (!empty($status) || $status === '0') {
            $filter[] = [ 'status', '=', $status];
        }

        if (isset($filter)) {
            $kurikulum = $kurikulum->where($filter);
        }

        if (!empty($search)) {
            $kurikulum = $kurikulum->where('nama', 'like', "%$search%");
        }

        $kurikulum = $kurikulum->paginate(15);

        return KurikulumResource::collection($kurikulum);
    }

    public function create(Request $request)
    {
        $kurikulum = Kurikulum::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $kurikulum = Kurikulum::find($id)->update($request->all());
    }

    public function destroy($id)
    {
    	Kurikulum::find($id)->delete();
    }
}
