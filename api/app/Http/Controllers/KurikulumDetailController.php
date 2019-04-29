<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurikulumDetailController extends Controller
{
    public function index()
    {
    	$kurikulum_detail = app('db')->table('kurikulum_detail')->get();

    	return response()->json($kurikulum_detail);
    }
}
