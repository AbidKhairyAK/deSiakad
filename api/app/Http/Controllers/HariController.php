<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HariController extends Controller
{
    public function list()
    {
    	$hari = app('db')->table('hari')->orderBy('id')->get();

    	return response()->json($hari);
    }
}
