<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
    	$jadwal = app('db')->table('jadwal')->get();

    	return response()->json($jadwal);
    }
}
