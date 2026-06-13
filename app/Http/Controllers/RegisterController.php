<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password; //Validar la contraseña

class RegisterController extends Controller
{
    /**
     * Muestra la vista con el formulario de registro.
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Procesa la información enviada desde el formulario
     * y valida que los datos cumplan las reglas definidas.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Nombre obligatorio con un máximo de 30 caracteres.
            'name' => 'required|max:30',

            // Username obligatorio, único en la tabla users y con una longitud entre 3 y 20 caracteres.
            'username' => 'required|unique:users|min:3|max:20',

            // Email obligatorio, único en la tabla users, con formato válido y máximo 60 caracteres.
            'email' => 'required|unique:users|email|max:60',

            // Contraseña obligatoria que debe:
            // - Tener al menos 6 caracteres.
            // - Contener mayúsculas y minúsculas.
            // - Contener al menos un número.
            // - Contener al menos un símbolo.
            // - Coincidir con el campo password_confirmation.
            'password' => [
                'required',
                'confirmed',
                Password::min(6)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ]);

        // Aquí irá la lógica para crear el usuario
        // y almacenarlo en la base de datos.
    }
}