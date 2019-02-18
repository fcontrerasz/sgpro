<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	//dd($request->user()->authorizeRoles(['generico', 'admin']));
    	$request->user()->authorizeRoles(['generico', 'admin']);
        return view('panel');
    }
}
