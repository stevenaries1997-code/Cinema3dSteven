<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        return view('registro');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'ninos' => 'required|integer|min:0',
            'madre_cabeza' => 'required|in:Sí,No',
            'estudia' => 'required|in:Sí,No',
            'generos' => 'nullable|array',
        ]);

        $datos['generos'] = implode(', ', $datos['generos'] ?? []);

        Registro::create($datos);

        return response()->json(['ok' => true]);
    }
}
