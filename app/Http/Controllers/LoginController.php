<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // dd("Autenticado...");  // Útil para ver si los endPoints se están comunicando

    /**
     * Muestra el formulario de login.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Procesa las credenciales enviadas desde el formulario.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos.
        // validate() devuelve un array con los datos validados.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar al usuario.
        //
        // Internamente Laravel:
        // 1. Busca el usuario por email.
        // 2. Obtiene la contraseña hasheada de la BD.
        // 3. Compara la contraseña enviada con el hash.
        // 4. Si coinciden, inicia sesión automáticamente.
        //
        // Devuelve:
        // true  -> Login correcto
        // false -> Login incorrecto
        if (!Auth::attempt($credentials)) {

            // Regresar al formulario conservando los datos introducidos y mostrar un mensaje de error.
            return back()
                ->withInput()
                ->with(
                    'mensaje',
                    'Credenciales Incorrectas'
                );
        }

        // Por seguridad, Laravel recomienda regenerar el ID de sesión después de autenticar.
        $request->session()->regenerate();

        // Redirigir al usuario autenticado al muro.
        return redirect()->route('posts.index');
    }
}