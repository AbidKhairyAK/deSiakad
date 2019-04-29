<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TahunAkademikController extends Controller
{
    public function index()
    {
    	$tahun_akademik = app('db')->table('tahun_akademik')->get();

    	return response()->json($tahun_akademik);
    }
}
