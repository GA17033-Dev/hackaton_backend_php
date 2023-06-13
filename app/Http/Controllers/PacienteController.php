<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ConsultoriosDetalle;
//use validator;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Response;


class PacienteController extends Controller
{



    
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'idtipoSangre' => 'required|integer',
            'idgenero' => 'required|integer',
            'padecimientos_general' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'edad' => 'required',
            'telefono' => 'required',
            'direccion_detalle' => 'required',
            'medico_encargado' => 'required',
            'observaciones' => 'required',
            // 'idconsultorio' => 'required|integer',
          //  'idmedico' => 'required|integer',
            'email' => 'required|email|unique:Pacientes,email',
        ]);


        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors()->first());
        }

        $validate_tiposangre = DB::table('TiposSangre')->where('idtipoSangre', $request->idtipoSangre)->first();
        if (!$validate_tiposangre) {
            return Response::respuesta(Response::retError, "El tipo de sangre no existe");
        }

        $validate_genero = DB::table('Generos')->where('idgenero', $request->idgenero)->first();
        if (!$validate_genero) {
            return Response::respuesta(Response::retError, "El genero no existe");
        }

        // $validate_consultorio = DB::table('Consultorios')->where('idconsultorio', $request->idconsultorio)->first();
        // if (!$validate_consultorio) {
        //     return Response::respuesta(Response::retError, "El consultorio no existe");
        // }

        // $validate_medico = DB::table('Medicos')->where('idmedico', $request->idmedico)->first();
        // if (!$validate_medico) {
        //     return Response::respuesta(Response::retError, "El medico no existe");
        // }
        $paciente = new Pacientes();
        $paciente->idtipoSangre = $request->idtipoSangre;
        $paciente->idgenero = $request->idgenero;
        $paciente->padecimientos_general = $request->padecimientos_general;
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->email = $request->email;
        $paciente->edad = $request->edad;
        $paciente->url_foto = $request->url_foto;
        $paciente->telefono = $request->telefono;
        $paciente->direccion_detalle = $request->direccion_detalle;
        $paciente->medico_encargado = $request->medico_encargado;
        $paciente->activo  = 1;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();
        // if ($paciente->save()) {
        //     $consultorioDetalle = new ConsultoriosDetalle();
        //     $consultorioDetalle->idpaciente = $paciente->idpaciente;
        //     $consultorioDetalle->idconsultorio = $request->idconsultorio;
        //     $consultorioDetalle->idmedico = $request->idmedico;
        //     $consultorioDetalle->save();

        return Response::respuesta(Response::retOK, "Paciente registrado correctamente");
        // }
        return Response::respuesta(Response::retOK, "Paciente registrado correctamente");
    }
}
