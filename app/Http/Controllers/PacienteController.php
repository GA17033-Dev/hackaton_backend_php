<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function register(Request $request)
    {
        $paciente = new Pacientes();
        $paciente->idtipoSangre = $request->idtipoSangre;
        $paciente->idgenero = $request->idgenero;
        $paciente->padecimientos_general = $request->padecimientos_general;
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->edad = $request->edad;
        $paciente->telefono = $request->telefono;
        $paciente->direccion_detalle = $request->direccion_detalle;
        $paciente->medico_encargado = $request->medico_encargado;
        $paciente->activo  = 1;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();
        return response()->json([
            "message" => "Paciente registrado correctamente",
            "data" => $paciente
        ], 201);
    }
}
