<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalikelasController extends Controller
{
    public function index()
    {
    	$walikelas = app('db')->table('walikelas')->get();

    	return response()->json($walikelas);
    }
}
