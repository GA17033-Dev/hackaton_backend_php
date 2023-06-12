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



    /**
     *
     *  @OA\Post(path="/api/register/paciente",
     *     tags={"Usuarios"},
     *     description="Registra un paciente",
     *     summary="Registra un paciente",
     *     operationId="registerpaciente",
     *     @OA\Response(
     *         response="200",
     *         description="Registro exitoso",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="access_token",
     *                  type="string",
     *                  description="Bearer token"
     *              ),
     *              @OA\Property(
     *                  property="token_type",
     *                  type="string",
     *                  description="Token type"
     *              ),
     *              @OA\Property(
     *                  property="user",
     *                  type="string",
     *                  description="Datos del usuario",
     *                
     *              ),
     *              @OA\Property(
     *                  property="expires_in",
     *                  type="integer",
     *                  description="Duración token"
     *              ),
     *          ),
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Recurso no encontrado. La petición no devuelve ningún dato",
     *     ),
     *     @OA\Response(
     *         response="403",
     *         description="Acceso denegado. No se cuenta con los privilegios suficientes",
     *         @OA\JsonContent(
     *              @OA\Property(property ="error",type="string",description="Mensaje de error de privilegios insuficientes")
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Error de Servidor.",
     *         @OA\JsonContent(
     *              @OA\Property(property ="error",type="string",description="Error de Servidor")
     *         )
     *     ),
     *
     *     @OA\RequestBody(
     *     description="Credenciales de ingreso",
     *     required=true,
     *     @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *             type="object",
     *              @OA\Property(
     *                 property="idtipoSangre",
     *                 description="Tipo de sangre del paciente",
     *                 type="integer"
     *             ),
     *             @OA\Property(
     *                 property="idgenero",
     *                 description="Género del paciente",
     *                 type="integer"
     *             ),
     *             @OA\Property(
     *                 property="padecimientos_general",
     *                 description="Padecimientos generales del paciente",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="nombre",
     *                 description="Nombre del paciente",
     *                 type="string"
     *             ),
     *  @OA\Property(
     *                 property="apellido",
     *                 description="Apellido del paciente",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="edad",
     *                 description="Edad del usuario",
     *                 type="integer"
     *             ),
     *              @OA\Property(
     *                 property="email",
     *                 description="Correo electrónico del usuario",
     *                 type="string"
     *             ),
     * @OA\Property(
     *                 property="telefono",
     *                 description="Teléfono del usuario",
     *                 type="string"
     *             ),
     *  @OA\Property(
     *                 property="url_foto",
     *                 description="URL de la foto del usuario",
     *                 type="string"
     *             ),
     * @OA\Property(
     *                 property="direccion_detalle",
     *                 description="Dirección del usuario",
     *                 type="string"
     *             ),
     * @OA\Property(
     *                 property="medico_encargado",
     *                 description="Medico encargado del usuario",
     *                 type="integer"
     *             ),
     *  @OA\Property(
     *                 property="observaciones",
     *                 description="Observaciones del usuario",
     *                 type="string"
     *             ),
     * @OA\Property(
     *                 property="idconsultorio",
     *                 description="Consultorio del usuario",
     *                 type="integer"
     *             ),
     * @OA\Property(
     *                 property="idmedico",
     *                 description="Medico del usuario",
     *                 type="integer"
     *             ),
     * 
     *         )
     *     )
     *  )
     * )
     */
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
