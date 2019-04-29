<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelSekolahController extends Controller
{
    public function index()
    {
    	$mapel_sekolah = app('db')->table('mapel_sekolah')->get();

    	return response()->json($mapel_sekolah);
    }
}
