<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UsuarioRoles;
use App\Models\Roles;
use Mailgun\Mailgun;
use App\Models\Cita;
use App\Helpers\Response;
use App\Models\CitaExamen;
use Carbon\Carbon;
use App\Models\Consulta;
use App\Models\ResultadoExamen;
use Illuminate\Support\Facades\Validator;
//DB
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    /**
     * Este metodo se encargara de crear la citas para el paciente , pero este sera especificamente
     * para que el paciente lo haga de su cuenta
     */

 /**
     *
     *  @OA\Post(path="/api/cita/register/cita/paciente",
     *     tags={"Cita"},
     *     description="Registra una nueva cita",
     *     summary="",
     *     operationId="registercitaid",
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
     *             required ={"usuario","password"},
     *            
     *             @OA\Property(
     *                 property="fecha_hora",
     *                 description="fecha y hora de la siguiente cita hecha por el paciente",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="medico_id",
     *                 description="id del medico encargado de la cita esto lo elejira el sistema de acuerdo a la especialidad que elija el paciente",
     *                 type="integer"
     *             ),
     *     

     * 
     *         )
     *     )
     *  )
     * )
     */



    public function register_cita_paciente(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fecha_hora' => 'required',
            'medico_id'=> 'required|integer'
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors());
        }
        $user = Auth::user();
        $cita = new Cita();
        $cita->fecha_hora = $request->fecha_hora;
        $cita->duracion_estimada = 1;
        $cita->paciente_id = $user->id;
        $cita->save();
        if ($cita->save()) {
            $consulta = new Consulta();
            $consulta->cita_id = $cita->id;
            $consulta->save();

            return Response::respuesta(Response::retOK, 'Cita creada Correctamente');
        }
        return Response::respuesta(Response::retError, 'Error Al crear Cita Correctamente');
    }



     /**
     *
     *  @OA\Post(path="/api/cita/register/examen/paciente",
     *     tags={"Cita"},
     *     description="Registra los examenes",
     *     summary="",
     *     operationId="registerexamenid",
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
     *             required ={"usuario","password"},
     *            
     *             @OA\Property(
     *                 property="fecha_hora",
     *                 description="fecha y hora de la siguiente cita hecha por el paciente",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="medico_id",
     *                 description="id del medico encargado de la cita esto lo elejira el sistema de acuerdo a la especialidad que elija el paciente",
     *                 type="integer"
     *             ),
     *     

     * 
     *         )
     *     )
     *  )
     * )
     */



    public function register_cita_paciente_examen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'datos' => 'required|array',
            'datos.*.cita_id' => 'required|integer',
            'datos.*.examen_id' => 'required|integer',
        ]);


        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors());
        }


        foreach ($request->datos as $key) {
            $citas[] = array(
                "cita_id" => $key['cita_id'],
                "examen_id" => $key['examen_id'],
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            );
        }

        $result = CitaExamen::insert($citas);

        if (!$result) {
            return Response::respuesta(Response::retError, "Error al guardar las examenes");
        }

        return Response::respuesta(Response::retOK, "examenes guardadas correctamente");
    }

     /**
     *
     *  @OA\Post(path="/api/cita/register/cita/medico",
     *     tags={"Cita"},
     *     description="Registra una nueva cita",
     *     summary="",
     *     operationId="registercitaidmedico",
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
     *             required ={"usuario","password"},
     *            
     *             @OA\Property(
     *                 property="fecha_hora",
     *                 description="fecha y hora de la siguiente cita hecha por el paciente",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="paciente_id",
     *                 description="id del paciente ya que el medico lo va a registra la siguiente cita del paciente",
     *                 type="integer"
     *             ),
     *     

     * 
     *         )
     *     )
     *  )
     * )
     */


    public function register_cita_medico(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fecha_hora' => 'required',
            'paciente_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors());
        }
        $user = Auth::user();
        $cita = new Cita();
        $cita->fecha_hora = $request->fecha_hora;
        $cita->duracion_estimada = 1;
        $cita->paciente_id = $request->paciente_id;
        $cita->medico_id = $user->id;
        $cita->save();
        if ($cita->save()) {
            $consulta = new Consulta();
            $consulta->cita_id = $cita->id;
            $consulta->save();

            return Response::respuesta(Response::retOK, 'Cita creada Correctamente');
        }
        return Response::respuesta(Response::retError, 'Error Al crear Cita Correctamente');
    }


    
     /**
     *
     *  @OA\Post(path="/api/cita/obtener/cita/examen",
     *     tags={"Cita"},
     *     description="Obtener los examenes de la cita",
     *     summary="",
     *     operationId="registerexamenidmedico",
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
     *    
     * )
     */


    public function obtener_examenes_cita(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cita_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors());
        }
        $examen_cita = CitaExamen::where('cita_id', $request->cita_id)->get();


        return Response::respuesta(Response::retOK, $examen_cita);
    }

     /**
     *
     *  @OA\Post(path="/api/cita/register/resultado/examen",
     *     tags={"Cita"},
     *     description="Registra los resultados de cada examen",
     *     summary="",
     *     operationId="registerresultadoid",
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
     *             required ={"usuario","password"},
     *            
     *             @OA\Property(
     *                 property="consulta_id",
     *                 description="id de la consulta",
     *                 type="integer"
     *             ),
     *             @OA\Property(
     *                 property="examen_id",
     *                 description="id del examen",
     *                 type="integer"
     *             ),
     *               @OA\Property(
     *                 property="resultado",
     *                 description="resulta de cada examen",
     *                 type="string"
     *             ),
     *     

     * 
     *         )
     *     )
     *  )
     * )
     */

    public function register_resultado_examenes(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'consulta_id' => 'required|integer',
            'examen_id' => 'required|integer',
            'resultado' => 'required|string'
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors());
        }
        $resultado_examen = new ResultadoExamen();
        $resultado_examen->consulta_id = $request->consulta_id;
        $resultado_examen->examen_id = $request->examen_id;
        $resultado_examen->resultado = $request->resultado;
        $resultado_examen->save();

        if ($resultado_examen->save()) {
            return Response::respuesta(Response::retOK, 'Resultado Registrado Correctamente');
        }

        return Response::respuesta(Response::retOK, 'Resultado No Guardado');
    }


    public function register_resultado_consulta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'peso' => 'required|string',
            'presion_arterial' => 'required|string',
            'temperatura' => 'required|number',
            'sintomas' => 'required|string',
            'diagnostico_general' => 'required|string',
            'observaciones' => 'required|string'
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors());
        }
        $resultado_consulta = Consulta::where('cita_id', $request->cita_id)->first();
        $resultado_consulta->peso = $request->peso;
        $resultado_consulta->presion_arterial = $request->presion_arterial;
        $resultado_consulta->temperatura = $request->temperatura;
        $resultado_consulta->sintomas = $request->sintomas;
        $resultado_consulta->diagnostico_general = $request->diagnostico_general;
        $resultado_consulta->observaciones = $request->observaciones;
        $resultado_consulta->save();

        if ($resultado_consulta->save()) {
            return Response::respuesta(Response::retOK, 'Resultado Registrado Correctamente');
        }

        return Response::respuesta(Response::retOK, 'Resultado No Guardado');
    }
}
