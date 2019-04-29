<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
    	$ruangan = app('db')->table('ruangan')->get();

    	return response()->json($ruangan);
    }
}
