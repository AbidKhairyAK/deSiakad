<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index()
    {
    	$kurikulum = app('db')->table('kurikulum')->get();

    	return response()->json($kurikulum);
    }
}
