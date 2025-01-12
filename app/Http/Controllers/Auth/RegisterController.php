<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Muestra el formulario de registro.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('auth.register'); // Aquí debes tener tu vista de formulario.
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255', // Campo combinado de nombre y apellidos
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed', // La contraseña debe ser confirmada
        ]);

        // Crear un nuevo usuario en la base de datos
        $user = User::create([
            'name' => $request->name, // Usar 'name' en lugar de 'nombre' y 'apellidos'
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encriptar la contraseña
        ]);

        // Obtener el ID del rol "usuario"
        $role = Role::where('name', 'usuario')->first();

        // Asignar el rol al usuario
        $user->roles()->attach($role->id);

        // Redirigir a una página de éxito, por ejemplo al login
        return redirect()->route('login')->with('success', '¡Cuenta creada con éxito!');
    }
}
