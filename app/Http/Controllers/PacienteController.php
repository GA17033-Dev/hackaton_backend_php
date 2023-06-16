<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ConsultoriosDetalle;
//use validator;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Response;
use Illuminate\Support\Facades\Auth;

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




    /**
     *
     *  @OA\Post(path="/api/register/enfermedades",
     *     tags={"Enfermedades"},
     *     description="Registra enfermedades del paciente",
     *     summary="",
     *     operationId="register",
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
     *                 property="enfermedad_id",
     *                 description="Id de la enfermedad",
     *                 type="integer"
     *             ),
     *             @OA\Property(
     *                 property="gravedad_id",
     *                 description="Id de la gravedad",
     *                 type="integer"
     *             ),
     *  @OA\Property(
     *                 property="fecha_inicio",
     *                 description="Fecha de inicio de la enfermedad",
     *                 type="string",
     *             ),
     *     

     * 
     *         )
     *     )
     *  )
     * )
     */


    public function enfermedades_paciente(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'enfermedad_id' => 'required|integer',
            'gravedad_id' => 'required|integer',
            'fecha_inicio' => 'required|date',
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors()->first());
        }
        $user = Auth()->user();
        $paciente = DB::insert('insert into enfermedades_paciente (paciente_id, enfermedad_id , gravedad_id ,fecha_inicio) values (?, ?)', [$user->id, $request->enfermedad_id, $request->gravedad_id, $request->fecha_inicio]);
        if ($paciente) {
            return Response::respuesta(Response::retOK, "Enfermedad registrada correctamente");
        }
        return Response::respuesta(Response::retError, "Error al registrar la enfermedad");
    }



    /**
     *
     *  @OA\Get(path="/api/obtener/enfermedades/paciente",
     *     tags={"Enfermedades"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Obtiene las enfermedades del paciente",
     *     operationId="obtenerEnfermedadesPaciente",
     *     summary="Obtiene las enfermedades del paciente",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna las enfermedades del paciente",
     *         @OA\JsonContent(
     *              @OA\Property(property ="resultado",type="string",description="Estado de resultado"),
     *              @OA\Property(
     *                  property="datos",
     *                  description="Datos del resultado de la api",
     *                  type="string",
     *
     *              ),
     *              @OA\Property(property ="entregado",type="string",description="Fecha hora de entrega"),
     *              @OA\Property(property ="consumo",type="number",description="Cant. recursos consumidos"),
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
     *              @OA\Property(property ="error",type="string",description="Error")
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Error de Servidor.",
     *         @OA\JsonContent(
     *              @OA\Property(property ="error",type="string",description="Error de Servidor")
     *         )
     *     ),
     * )
     *
     */
    public function obtener_enfermedades_paciente()
    {
        $user = Auth()->user();
        $paciente = DB::select('select * from enfermedades_paciente where paciente_id = ?', [$user->id]);
        if ($paciente) {
            return Response::respuesta(Response::retOK, $paciente);
        }

        return Response::respuesta(Response::retError, "Error al obtener las enfermedades");
    }

    /**
     * @OA\Put(path="/api/editar/enfermedades/paciente/{id}",
     *  tags={"Enfermedades"},
     * security={
     *         {"token": {}},
     *    },
     * summary="Editar enfermedades del paciente",
     * @OA\Parameter(
     *   description="ID de la enfermedad del paciente",
     *  in="path",
     * name="id",
     * required=true,
     * @OA\Schema(
     *    type="integer",
     *   format="int64"
     * )
     * ),
     * @OA\RequestBody(
     *    description="Credenciales de ingreso",
     *   required=true,
     *  @OA\MediaType(
     *        mediaType="application/json",
     *      @OA\Schema(
     *           type="object",
     *         required ={"enfermedad_id","gravedad_id","fecha_inicio"},
     *        @OA\Property(
     *              property="enfermedad_id",
     *            description="Id de la enfermedad",
     *         type="integer"
     *      ),
     *     @OA\Property(
     *          property="gravedad_id",
     *        description="Id de la gravedad",
     *     type="integer"
     * ),
     * @OA\Property(
     *     property="fecha_inicio",
     *  description="Fecha de inicio de la enfermedad",
     * type="string",
     * ),
     * )
     * )
     * ),
     * @OA\Response(
     *   response=200,
     * description="Enfermedad editada correctamente",
     * @OA\JsonContent(
     * @OA\Property(property ="resultado",type="string",description="Estado de resultado"),
     * @OA\Property(
     *    property="datos",
     *  description="Datos del resultado de la api",
     * type="string",
     * ),
     * @OA\Property(property ="entregado",type="string",description="Fecha hora de entrega"),
     * @OA\Property(property ="consumo",type="number",description="Cant. recursos consumidos"),
     * ),
     * ),
     * @OA\Response(
     *  response=404,
     * description="Recurso no encontrado. La petición no devuelve ningún dato",
     * ),
     * @OA\Response(
     * response=403,
     * description="Acceso denegado. No se cuenta con los privilegios suficientes",
     * @OA\JsonContent(
     * @OA\Property(property ="error",type="string",description="Error")
     * )
     * ),
     * @OA\Response(
     * response=500,
     * description="Error de Servidor.",
     * @OA\JsonContent(
     * @OA\Property(property ="error",type="string",description="Error de Servidor")
     * )
     * ),
     * )
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     */

    public function editar_enfermedades_paciente(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'enfermedad_id' => 'required|integer',
            'gravedad_id' => 'required|integer',
            'fecha_inicio' => 'required|date',
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors()->first());
        }

        $user = Auth()->user();
        $paciente = DB::update('update enfermedades_paciente set enfermedad_id = ?, gravedad_id = ?, fecha_inicio = ? where id = ?', [$request->enfermedad_id, $request->gravedad_id, $request->fecha_inicio, $id]);

        if ($paciente) {
            return Response::respuesta(Response::retOK, "Enfermedad actualizada correctamente");
        }

        return Response::respuesta(Response::retError, "Error al actualizar la enfermedad");
    }

    /**
     * @OA\Delete(path="/api/eliminar/enfermedades/paciente/{id}",
     *  tags={"Enfermedades"},
     * security={
     *        {"token": {}},
     *  },
     * summary="Eliminar enfermedades del paciente",
     * @OA\Parameter(
     *  description="ID de la enfermedad del paciente",
     * in="path",
     * name="id",
     * required=true,
     * @OA\Schema(
     *   type="integer",
     * format="int64"
     * )
     * ),
     * @OA\Response(
     * response=200,
     * 
     * description="Enfermedad eliminada correctamente",
     * @OA\JsonContent(
     * @OA\Property(property ="resultado",type="string",description="Estado de resultado"),
     * @OA\Property(
     *   property="datos",
     * description="Datos del resultado de la api",
     * type="string",
     * ),
     * @OA\Property(property ="entregado",type="string",description="Fecha hora de entrega"),
     * @OA\Property(property ="consumo",type="number",description="Cant. recursos consumidos"),
     * ),
     * ),
     * @OA\Response(
     * response=404,
     * description="Recurso no encontrado. La petición no devuelve ningún dato",
     * ),
     * @OA\Response(
     * response=403,
     * description="Acceso denegado. No se cuenta con los privilegios suficientes",
     * @OA\JsonContent(
     * @OA\Property(property ="error",type="string",description="Error")
     * )
     * ),
     * @OA\Response(
     * response=500,
     * description="Error de Servidor.",
     * @OA\JsonContent(
     * @OA\Property(property ="error",type="string",description="Error de Servidor")
     * )
     * ),
     * )
     * 
     * 
     * 
     * 
     */



    public function eliminar_enfermedades_paciente($id)
    {
        $user = Auth()->user();
        $paciente = DB::delete('delete from enfermedades_paciente where id = ? and paciente_id =? ', [$id, $user->id]);

        if ($paciente) {
            return Response::respuesta(Response::retOK, "Enfermedad eliminada correctamente");
        }

        return Response::respuesta(Response::retError, "Error al eliminar la enfermedad");
    }
}
