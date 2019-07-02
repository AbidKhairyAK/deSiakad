<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Siswa;
use App\Http\Resources\SiswaResource;

class SiswaController extends Controller
{
    private $path;

    function __construct()
    {
        $this->path = public_path().'/../../src/assets/siswa/';;
    }

    public function index(Request $request)
    {
        $angkatan = $request->get('angkatan');
        $agama = $request->get('agama');
        $gender = $request->get('gender');
        $search = $request->get('search');

        $siswa = Siswa::with(['angkatan', 'agama'])
            ->orderBy('id_angkatan', 'desc')->orderBy('nama');

        if (!empty($angkatan)) {
            $filter[] = [ 'id_angkatan', '=', $angkatan];
        }

        if (!empty($agama)) {
            $filter[] = [ 'id_agama', '=', $agama];
        }

        if (!empty($gender)) {
            $filter[] = [ 'gender', '=', $gender];
        }

        if (isset($filter)) {
            $siswa = $siswa->where($filter);
        }

        if (!empty($search)) {
            $siswa = $siswa->where(function($query) use ($search) {
                $query->where('nis', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%")
                    ->orWhere('tempat_lahir', 'like', "%$search%")
                    ->orWhere('tanggal_lahir', 'like', "%$search%");
            });
        }
            
        $siswa = $siswa->paginate(15);

        return SiswaResource::collection($siswa);
    }

    public function create(Request $request)
    {
        unset($request['foto']);
        unset($request['foto_data']);

        $siswa = Siswa::create($request->all());

        return response()->json(['id' => $siswa->id]);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id)->update($request->all());

        return response()->json(['id' => $id]);
    }

    public function addFoto(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        $file = $request->file('foto');
        $new_name = time().'.'.$file->getClientOriginalExtension();
        $file->move($this->path, $new_name);

        if ($siswa->foto != null && $guru->foto != 'logo.png') {
            unlink($this->path.$siswa->foto);
        }

        $siswa->update(['foto' => $new_name]);
    }

    public function destroy($id)
    {
    	$siswa = Siswa::find($id);

        if ($siswa->foto != null && $siswa->foto != 'logo.png') {
            unlink($this->path.$siswa->foto);
        }

        $siswa->delete();
    }
}
