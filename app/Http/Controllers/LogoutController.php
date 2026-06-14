<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Para usar la autenticación 

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        // dd('Cerrando Sesión'); 

        // Cerrar la sesión del usuario autenticado.
        // Laravel elimina la información de autenticación almacenada en la sesión.
        Auth::logout();

        // Invalidar completamente la sesión actual.
        // Esto elimina todos los datos asociados a la sesión.
        $request->session()->invalidate();

        // Generar un nuevo token CSRF para la siguiente sesión.
        // Ayuda a prevenir ataques relacionados con sesiones antiguas.
        $request->session()->regenerateToken();

        // Redirigir al formulario de login.
        return redirect()->route('login');
    }
}
