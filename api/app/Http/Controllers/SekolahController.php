<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
    	$sekolah = app('db')->table('sekolah')->first();
    	$diff = date_diff(date_create($sekolah->created_at), date_create());

    	return response()->json([
    		"npsn"			=> $sekolah->npsn,
		    "nama"			=> $sekolah->nama,
		    "alamat"		=> $sekolah->alamat,
		    "email"			=> $sekolah->email,
		    "telepon"		=> $sekolah->telepon,
		    "first_usage"	=> date('D, d M Y', strtotime($sekolah->created_at)),
		    "usage_time"	=> $diff->y.' tahun '.$diff->m.' bulan '.$diff->d.' hari',
    	]);
    }

    public function save(Request $request)
    {
    	app('db')->table('sekolah')->update([
    		"npsn"		=> $request->npsn,
		    "nama"		=> $request->nama,
		    "alamat"	=> $request->alamat,
		    "email"		=> $request->email,
		    "telepon"	=> $request->telepon,
    	]);
    }
}
