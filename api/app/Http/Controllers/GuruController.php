<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
    	$guru = app('db')->table('guru')->get();

    	return response()->json($guru);
    }
}
