<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Guru;
use App\Http\Resources\GuruResource;

class GuruController extends Controller
{
    private $path;

    function __construct()
    {
        $this->path = public_path().'/../../src/assets/guru/';;
    }

    public function index(Request $request)
    {
        $status = $request->get('status');
        $agama = $request->get('agama');
        $gender = $request->get('gender');
        $search = $request->get('search');

        $guru = Guru::with('agama')
            ->orderBy('nama');

        if (!empty($status) || $status === '0') {
            $filter[] = [ 'status', '=', $status];
        }

        if (!empty($agama)) {
            $filter[] = [ 'id_agama', '=', $agama];
        }

        if (!empty($gender)) {
            $filter[] = [ 'gender', '=', $gender];
        }

        if (isset($filter)) {
            $guru = $guru->where($filter);
        }

        if (!empty($search)) {
            $guru = $guru->where(function($query) use ($search) {
                $query->where('nik', 'like', "%$search%")
                    ->orWhere('nuptk', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%");
            });
        }
            
        $guru = $guru->paginate(15);

        return GuruResource::collection($guru);
    }

    public function create(Request $request)
    {
        unset($request['foto']);
        unset($request['foto_data']);

        $guru = Guru::create($request->all());

        return response()->json(['id' => $guru->id]);
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::find($id)->update($request->all());

        return response()->json(['id' => $id]);
    }

    public function addFoto(Request $request, $id)
    {
        $guru = Guru::find($id);

        $file = $request->file('foto');
        $new_name = time().'.'.$file->getClientOriginalExtension();
        $file->move($this->path, $new_name);

        if ($guru->foto != null && $guru->foto != 'logo.png') {
            unlink($this->path.$guru->foto);
        }

        $guru->update(['foto' => $new_name]);
    }

    public function destroy($id)
    {
    	$guru = Guru::find($id);

        if ($guru->foto != null && $guru->foto != 'logo.png') {
            unlink($this->path.$guru->foto);
        }

        $guru->delete();
    }
}
