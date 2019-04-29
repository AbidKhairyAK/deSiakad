<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
    	$menus = app('db')->table('menu')->get();

    	return response()->json($menus);
    }
}
