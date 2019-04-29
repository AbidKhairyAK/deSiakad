<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
    	$mapel = app('db')->table('mapel')->get();

    	return response()->json($mapel);
    }
}
