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
use App\Models\User;
use App\Models\Parientes;

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
     *  @OA\Post(path="/api/paciente/register/enfermedades",
     *     tags={"Paciente"},
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
        $paciente = DB::table('enfermedades_paciente')->insert(
            [
                'paciente_id' => $user->id,
                'enfermedad_id' => $request->enfermedad_id,
                'gravedad_id' => $request->gravedad_id,
                'fecha_inicio' => $request->fecha_inicio,
            ]
        );
        // $paciente = DB::insert('insert into enfermedades_paciente (paciente_id, enfermedad_id , gravedad_id ,fecha_inicio) values (?, ?)', [$user->id, $request->enfermedad_id, $request->gravedad_id, $request->fecha_inicio]);
        if ($paciente) {
            return Response::respuesta(Response::retOK, "Enfermedad registrada correctamente");
        }
        return Response::respuesta(Response::retError, "Error al registrar la enfermedad");
    }



    /**
     *
     *  @OA\Get(path="/api/paciente/obtener/enfermedades",
     *     tags={"Paciente"},
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
        // $paciente = DB::select('select * from enfermedades_paciente where paciente_id = ?', [$user->id]);
        $paciente = DB::table('enfermedades_paciente')
            ->join('enfermedades', 'enfermedades_paciente.enfermedad_id', '=', 'enfermedades.id')
            ->join('gravedad_enfermedades', 'enfermedades_paciente.gravedad_id', '=', 'gravedad_enfermedades.id')
            ->select('enfermedades_paciente.id', 'enfermedades.nombre as enfermedad', 'gravedad_enfermedades.nombre as gravedad', 'enfermedades_paciente.fecha_inicio')
            ->where('enfermedades_paciente.paciente_id', '=', $user->id)
            ->get();
        if ($paciente) {
            return Response::respuesta(Response::retOK, $paciente);
        }

        return Response::respuesta(Response::retError, "Error al obtener las enfermedades");
    }

    /**
     * @OA\Put(path="/api/paciente/editar/enfermedades/{id}",
     *  tags={"Paciente"},
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

        $paciente = DB::table('enfermedades_paciente')
            ->where('id', $id)
            ->where('paciente_id', $user->id)
            ->update([
                'enfermedad_id' => $request->enfermedad_id,
                'gravedad_id' => $request->gravedad_id,
                'fecha_inicio' => $request->fecha_inicio,
            ]);
        // $paciente = DB::update('update enfermedades_paciente set enfermedad_id = ?, gravedad_id = ?, fecha_inicio = ? where id = ?', [$request->enfermedad_id, $request->gravedad_id, $request->fecha_inicio, $id]);

        if ($paciente) {
            return Response::respuesta(Response::retOK, "Enfermedad actualizada correctamente");
        }

        return Response::respuesta(Response::retError, "Error al actualizar la enfermedad");
    }

    /**
     * @OA\Delete(path="/api/paciente/eliminar/enfermedades/{id}",
     *  tags={"Paciente"},
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

        $paciente = DB::table('enfermedades_paciente')->where('id', $id)->where('paciente_id', $user->id)->delete();
        // $paciente = DB::delete('delete from enfermedades_paciente where id = ? and paciente_id =? ', [$id, $user->id]);
        if ($paciente) {
            return Response::respuesta(Response::retOK, "Enfermedad eliminada correctamente");
        }

        return Response::respuesta(Response::retError, "Error al eliminar la enfermedad");
    }



    /**
     *
     *  @OA\Post(path="/api/paciente/register/tipo/sangre",
     *     tags={"Paciente"},
     *     description="Registro de tipo de sangre del paciente",
     *     summary="Registro de tipo de sangre del paciente",
     *     operationId="registertiposangrepaciente",
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
     *                 property="tipo_sangre_id",
     *                 description="ID del tipo de sangre",
     *                 type="integer"
     *             ),
     *     

     * 
     *         )
     *     )
     *  )
     * )
     */


    public function register_tipo_sangre(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipo_sangre_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors()->first());
        }
        $user = Auth()->user();
        $tipo_sangre = User::where('id', $user->id)->first();
        $tipo_sangre->tipo_sangre_id = $request->tipo_sangre_id;
        $tipo_sangre->save();

        if ($tipo_sangre) {
            return Response::respuesta(Response::retOK, "Tipo de sangre registrado correctamente");
        }

        return Response::respuesta(Response::retError, "Error al registrar el tipo de sangre");
    }


    public function editar_tipo_sangre(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipo_sangre_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors()->first());
        }
        $user = Auth()->user();
        $tipo_sangre = User::where('id', $user->id)->first();
        $tipo_sangre->tipo_sangre_id = $request->tipo_sangre_id;
        $tipo_sangre->save();

        if ($tipo_sangre) {
            return Response::respuesta(Response::retOK, "Tipo de sangre editado correctamente");
        }

        return Response::respuesta(Response::retError, "Error al editar el tipo de sangre");
    }





    /**
     *
     *  @OA\Post(path="/api/paciente/register/parientes",
     *     tags={"Paciente"},
     *     description="Registro de parientes del paciente",
     *     summary="Registro de parientes del paciente",
     *     operationId="registerparientespaciente",
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
     *                 property="nombre",
     *                 description="Nombre del pariente",
     *                 type="string"
     *             ),
     *  @OA\Property(
     *                 property="apellido",
     *                 description="Apellido del pariente",
     *                 type="string"
     *             ),
     *   @OA\Property(
     *                 property="telefono",
     *                 description="Telefono del pariente",
     *                 type="string"
     *             ),
     * @OA\Property(
     *                 property="parentesco_id",
     *                 description="ID del parentesco",
     *                 type="integer"
     *             ),
     *     

     * 
     *         )
     *     )
     *  )
     * )
     */
    public function register_parientes(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|string',
            'parentesco_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors()->first());
        }
        $user = Auth()->user();
        $pariente = new Parientes();
        $pariente->nombre = $request->nombre;
        $pariente->apellido = $request->apellido;
        $pariente->telefono = $request->telefono;
        $pariente->parentesco_id = $request->parentesco_id;
        $pariente->usuario_id = $user->id;
        $pariente->save();

        if ($pariente) {
            return Response::respuesta(Response::retOK, "Pariente registrado correctamente");
        }

        return Response::respuesta(Response::retError, "Error al registrar el pariente");
    }


    /**
     *
     * @OA\Put(
     *     path="/api/paciente/editar/parientes/{id}",
     *     tags={"Paciente"},
     *     description="Editar pariente de un paciente",
     *     summary="Editar pariente de un paciente",
     *     operationId="editParientePaciente",
     *     @OA\Parameter(
     *         name="pacienteId",
     *         in="path",
     *         description="ID del paciente",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del pariente",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Pariente actualizado exitosamente",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Mensaje de éxito"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Solicitud inválida. Verifica los parámetros de entrada",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", description="Mensaje de error de solicitud inválida")
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Recurso no encontrado. El paciente o el pariente no existen",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", description="Mensaje de error de recurso no encontrado")
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Error de Servidor",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", description="Error de servidor")
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="Datos del pariente a editar",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="nombre",
     *                     description="Nombre del pariente",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="apellido",
     *                     description="Apellido del pariente",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="telefono",
     *                     description="Teléfono del pariente",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="parentesco_id",
     *                     description="ID del parentesco",
     *                     type="integer"
     *                 )
     *             )
     *         )
     *     )
     * )
     */



    public function editar_parientes(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|string',
            'parentesco_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors()->first());
        }
        $user = Auth()->user();
        $pariente = Parientes::where('id', $id)->first();
        $pariente->nombre = $request->nombre;
        $pariente->apellido = $request->apellido;
        $pariente->telefono = $request->telefono;
        $pariente->parentesco_id = $request->parentesco_id;
        $pariente->usuario_id = $user->id;
        $pariente->save();

        if ($pariente) {
            return Response::respuesta(Response::retOK, "Pariente editado correctamente");
        }

        return Response::respuesta(Response::retError, "Error al editar el pariente");
    }
    /**
     *
     *  @OA\Get(path="/api/paciente/obtener/parientes",
     *     tags={"Paciente"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Obtiene los parientes de un paciente",
     *     operationId="getParientesPaciente",
     *     summary="Obtiene los parientes de un paciente",
     *     @OA\Response(
     *         response="200",
     *         description="Parientes obtenidos exitosamente",
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

    public function obtener_parientes()
    {
        $user = Auth()->user();
        $parientes = DB::table('parientes')
            ->join('catalogo_parentesco', 'parientes.parentesco_id', '=', 'catalogo_parentesco.id')
            ->select('parientes.*', 'catalogo_parentesco.nombre as parentesco')
            ->where('parientes.usuario_id', $user->id)
            ->get();
        if ($parientes) {
            return Response::respuesta(Response::retOK, $parientes);
        }

        return Response::respuesta(Response::retError, "Error al obtener los parientes");
    }
}
