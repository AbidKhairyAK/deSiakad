<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\JenisPembayaran;
use App\Http\Resources\JenisPembayaranResource;

class JenisPembayaranController extends Controller
{
    public function list()
    {
        $jenis_pembayaran = app('db')->table('jenis_pembayaran')->get();

        return response()->json($jenis_pembayaran);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $jenis_pembayaran = JenisPembayaran::orderBy('kode');

        if (!empty($search)) {
            $jenis_pembayaran = $jenis_pembayaran->where('kode', 'like', "%$search%")
                    			->orWhere('nama', 'like', "%$search%");
        }

        $jenis_pembayaran = $jenis_pembayaran->paginate(15);

        return JenisPembayaranResource::collection($jenis_pembayaran);
    }

    public function create(Request $request)
    {
        $jenis_pembayaran = JenisPembayaran::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $jenis_pembayaran = JenisPembayaran::find($id)->update($request->all());
    }

    public function destroy($id)
    {
    	JenisPembayaran::find($id)->delete();
    }
}
