<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	/*
   public function __construct()
   {
       $this->middleware('auth');
   }*/

    public function index()
    {
    	/*
    	$user = Auth::user();
    	$rol = $user->roles->implode('name', ',');
    	*/
    	
        return view('home.index');
    }
}