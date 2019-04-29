<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgamaController extends Controller
{
    public function index()
    {
    	$agama = app('db')->table('agama')->get();

    	return response()->json($agama);
    }
}
