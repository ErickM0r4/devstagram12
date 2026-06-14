<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Muestra el perfil de un usuario.
     *
     * Laravel obtiene automáticamente el usuario desde la URL
     * utilizando Route Model Binding.
     *
     * Ejemplo:
     * /juan
     *
     * Laravel ejecuta internamente algo similar a:
     *
     * User::where('username', 'juan')->firstOrFail();
     */
    public function index(User $user)
    {
        return view('layouts.dashboard', compact('user'));

        /* Lo anterior es como hacer lo siguiente: 
        return view('layouts.dashboard', [
            'user' => $user
        ]); 
        */
    }
}
