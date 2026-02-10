<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Direccion;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisteredUserController extends Controller
{
    public function create()
    {
        $direcciones = Direccion::all();
        $areas = Area::all();
        return view('auth.register', compact('direcciones', 'areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:usuarios',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'celular' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'direccion_id' => 'required|exists:direcciones,id',
            'area_id' => 'required|exists:areas,id',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'celular' => $request->celular,
            'password' => bcrypt($request->password),
            'direccion_id' => $request->direccion_id,
            'area_id' => $request->area_id,
            'rol_id' => 4, // Asignar rol de usuario regular
        ]);

        return redirect('/login')->with('success', 'Usuario registrado exitosamente. Por favor, inicie sesión.');
    }
}
