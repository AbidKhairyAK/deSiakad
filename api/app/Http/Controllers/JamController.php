<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Jam;
use App\Http\Resources\JamResource;

class JamController extends Controller
{
    public function list()
    {
    	$jam = app('db')->table('jam')->get();

    	return response()->json($jam);
    }
}
