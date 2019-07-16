<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pembayaran;
use App\Http\Resources\PembayaranResource;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->get('jenis');
        $search = $request->get('search');

        $pembayaran = Pembayaran::with(['siswa', 'jenis_pembayaran'])
            ->orderBy('created_at', 'desc');

        if (!empty($jenis)) { $filter[] = [ 'id_jenis_pembayaran', '=', $jenis]; }

        if (isset($filter)) { $pembayaran = $pembayaran->where($filter); }

        if (!empty($search)) {
            $pembayaran = $pembayaran->whereHas('siswa', function($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->orWhereHas('jenis_pembayaran', function($query) use ($search) {
                $query->where('kode', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%");
            })
            ->orWhere(function($query) use ($search) {
                $query->where('tanggal', 'like', "%$search%")
                    ->orWhere('jumlah', 'like', "%$search%")
                    ->orWhere('keterangan', 'like', "%$search%");
            });
        }
            
        $pembayaran = $pembayaran->paginate(15);

        return PembayaranResource::collection($pembayaran);
    }

    public function create(Request $request)
    {
        $pembayaran = Pembayaran::create($request->all());

        return response()->json(['id' => $pembayaran->id]);
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::find($id)->update($request->all());

        return response()->json(['id' => $id]);
    }

    public function destroy($id)
    {
    	$pembayaran = Pembayaran::find($id);

        $pembayaran->delete();
    }
}
