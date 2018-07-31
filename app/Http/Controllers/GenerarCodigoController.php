<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerarCodigoController extends Controller
{
    public function index()
    {
    	return view('generar-codigo');
    }
}
