<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
    	$pengguna = app('db')->table('pengguna')->get();

    	return response()->json($pengguna);
    }
}
