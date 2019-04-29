<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
    	$sekolah = app('db')->table('sekolah')->get();

    	return response()->json($sekolah);
    }
}
