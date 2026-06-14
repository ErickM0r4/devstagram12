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
        // Validar los datos enviados por el usuario.
        // Si la validación falla, Laravel redirige automáticamente
        // al formulario anterior mostrando los errores.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Obtener el valor de la casilla "Recordarme".
        //
        // Si está marcada:
        // true
        //
        // Si no está marcada:
        // false
        $remember = $request->boolean('remember');

        // Intentar autenticar al usuario.
        //
        // Laravel realiza internamente:
        //
        // 1. Busca un usuario con ese email.
        // 2. Obtiene la contraseña hasheada de la base de datos.
        // 3. Compara la contraseña enviada con el hash almacenado.
        // 4. Si coinciden, inicia sesión.
        //
        // El segundo parámetro ($remember) indica si Laravel
        // debe crear una cookie persistente para mantener
        // la sesión abierta incluso después de cerrar el navegador.
        if (!Auth::attempt($credentials, $remember)) {

            // Si las credenciales son incorrectas:
            //
            // - Regresar al formulario anterior.
            // - Mantener los datos introducidos.
            // - Mostrar un mensaje de error.
            return back()
                ->withInput()
                ->with(
                    'mensaje',
                    'Credenciales Incorrectas'
                );
        }

        // Regenerar el ID de la sesión por seguridad.
        //
        // Esto ayuda a prevenir ataques de Session Fixation.
        $request->session()->regenerate();

        // Redirigir al usuario autenticado al muro principal.
        return redirect()->route('posts.index');
    }
}
