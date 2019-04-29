<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
    	$jenjang = app('db')->table('jenjang')->get();

    	return response()->json($jenjang);
    }
}
