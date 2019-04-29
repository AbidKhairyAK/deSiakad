<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
    	$level = app('db')->table('level')->get();

    	return response()->json($level);
    }
}
