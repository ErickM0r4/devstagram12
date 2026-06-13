<?php

namespace App\Http\Controllers;

use App\Models\User; // Modelo User para interactuar con la tabla users
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Permite generar hashes seguros para las contraseñas
use Illuminate\Support\Str; // Utilidades para trabajar con cadenas de texto
use Illuminate\Validation\Rules\Password; // Reglas avanzadas de validación de contraseñas

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
     * Procesa la información enviada desde el formulario.
     * Valida los datos y crea un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // Convierte el username a un formato amigable para URLs.
        // Ejemplo:
        // "Juan Pérez" => "juan-perez"
        // "Mi Usuario" => "mi-usuario"
        $request->request->add([
            'username' => Str::slug($request->username),
        ]);

        // Validar los datos recibidos del formulario.
        $request->validate([
            // Nombre obligatorio con un máximo de 30 caracteres.
            'name' => 'required|max:30',

            // Username obligatorio.
            // Debe ser único en la tabla users.
            // Debe tener entre 3 y 20 caracteres.
            'username' => 'required|unique:users|min:3|max:20',

            // Email obligatorio.
            // Debe ser único en la tabla users.
            // Debe tener un formato de correo válido.
            // Máximo 60 caracteres.
            'email' => 'required|unique:users|email|max:60',

            // Contraseña obligatoria que debe:
            // - Coincidir con password_confirmation.
            // - Tener mínimo 6 caracteres.
            // - Contener mayúsculas y minúsculas.
            // - Contener al menos un número.
            // - Contener al menos un símbolo.
            'password' => [
                'required',
                'confirmed',
                Password::min(6)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ]);

        // Crear el usuario en la base de datos.
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,

            // Genera un hash seguro antes de guardar la contraseña.
            // Ejemplo:
            // "MiPassword123!" => "$2y$12$..."
            'password' => Hash::make($request->password),

            // Si el modelo User tiene:
            // 'password' => 'hashed'
            // dentro del método casts(), entonces Laravel realizará el hash automáticamente y podrías usar:
            // 'password' => $request->password,
        ]);

        // Redireccionar
        return redirect()->route('posts.index'); 
    }
}