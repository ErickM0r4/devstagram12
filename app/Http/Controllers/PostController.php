<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Muestra la vista del muro
     */
    public function index()
    {
        return dd('Desde el Muro');
    }
}
