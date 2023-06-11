<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Models\User;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mailgun\Mailgun;
//DB
use Illuminate\Support\Facades\DB;
use Mailgun\HttpClient\HttpClientConfigurator;
use Mailgun\Hydrator\NoopHydrator;
//validate
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //constructor

    /**
     *
     *  @OA\Get(path="/api/roles",
     *     tags={"Usuarios"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de los roles",
     *     operationId="rolesid",
     *     summary="Muestra los roles",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los roles",
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
    public function index()
    {
        $roles = DB::table('Roles')->get();
        return Response::respuesta(Response::retOK, $roles);
    }

    /**
     *
     *  @OA\Get(path="/usuario/profile",
     *     tags={"Usuarios"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve todos los datos del usuario actual menos los ocultos, no es necesario que se envíen parámetros pero sí es necesario estar logueado.",
     *     operationId="usuariosProfile",
     *     summary="Muestra los datos del usuario logueado",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el perfil del usuario logueado",
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
    public function profile()
    {
        $user = Auth::user();
        return Response::respuesta(Response::retOK, $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     *
     *  @OA\Post(path="/api/register/medico",
     *     tags={"Usuarios"},
     *     description="Registra un usuario",
     *     summary="Registra un usuario",
     *     operationId="register",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el usuario registrado",
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
     *              @OA\Property(
     *                 property="apellido",
     *                 description="Apellido del usuario",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="nombre",
     *                 description="Nombre del usuario",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="email",
     *                 description="Correo electrónico del usuario",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="password",
     *                 description="Cláve de ingreso al sistema",
     *                 type="string"
     *             ),
     *  @OA\Property(
     *                 property="telefono",
     *                 description="Teléfono del usuario",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="edad",
     *                 description="Edad del usuario",
     *                 type="integer"
     *             ),
     *              @OA\Property(
     *                 property="idgenero",
     *                 description="Género del usuario",
     *                 type="integer"
     *             ),
     * @OA\Property(
     *                 property="idespecialidad",
     *                 description="Especialidad del usuario",
     *                 type="integer"
     *             ),
     * 
     *         )
     *     )
     *  )
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'apellido' => 'required',
            'nombre' => 'required',
            'email' => 'required|email|unique:Usuarios',
            'password' => 'required',
            'edad' => 'required',
            'telefono' => 'required|unique:Usuarios',
            'idgenero' => 'required',
            'idespecialidad' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::respuesta(Response::retError, $validator->errors());
        }
        //validar idgenero
        $validar_genero = DB::table('Generos')->where('idgenero', $request->idgenero)->first();


        if (!$validar_genero) {
            return Response::respuesta(Response::retError, "El género no existe");
        }

        $validar_especialidad = DB::table('Especialidades')->where('idespecialidad', $request->idespecialidad)->first();

        if (!$validar_especialidad) {
            return Response::respuesta(Response::retError, "La especialidad no existe");
        }
        $user = new User();
        $user->apellido = $request->apellido;
        $user->nombre = $request->nombre;

        $usuario = $this->generar_usuario($request->nombre, $request->apellido);
        $user->usuario = $usuario;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->edad = $request->edad;
        $user->telefono = $request->telefono;
        $user->activo = 1;
        $user->idrol = 12;
        $user->idgenero = $request->idgenero;
        if ($user->save()) {
            $medico = new Medico();
            $medico->idusuario = $user->idusuario;
            $medico->idespecialidad = $request->idespecialidad;
            $medico->save();
            return Response::respuesta(Response::retOK, 'Medico creado correctamente');
        } else {
            return Response::respuesta(Response::retError, "Error al crear el medico");
        }
    }


    public function generar_usuario($nombre, $apellido)
    {
        //generar un usuario ramdon con el nombre y apellido y un numero
        $usuario = strtolower(substr($nombre, 0, 1) . $apellido . rand(1, 100));
        return $usuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
