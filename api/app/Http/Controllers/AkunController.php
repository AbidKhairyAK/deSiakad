<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Akun;
use App\Model\Guru;

class AkunController extends Controller
{
    public function index()
    {
    	$pengguna = app('db')->table('akun')->get();

    	return response()->json($pengguna);
    }

    public function check($identity)
    {
    	$check = Guru::where('nik', $identity)->orWhere('nuptk', $identity)->exists();

    	return response()->json(['check' => $check]);
    }

    public function register(Request $request)
    {
    	$request->merge([
    		'password' => app('hash')->make($request->password)
    	]);

    	Akun::create($request->all());
    }
}
