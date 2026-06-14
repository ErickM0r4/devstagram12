<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Muestra la vista del muro (Redes sociales)
     */
    public function index()
    {
        return view('layouts.dashboard'); 
    }
}
