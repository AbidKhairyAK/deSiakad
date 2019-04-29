<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
    	$jurusan = app('db')->table('jurusan')->get();

    	return response()->json($jurusan);
    }
}
