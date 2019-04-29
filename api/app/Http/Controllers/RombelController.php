<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RombelController extends Controller
{
    public function index()
    {
    	$rombel = app('db')->table('rombel')->get();

    	return response()->json($rombel);
    }
}
