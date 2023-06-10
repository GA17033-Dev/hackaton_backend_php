<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mailgun\Mailgun;
use Mailgun\HttpClient\HttpClientConfigurator;
use Mailgun\Hydrator\NoopHydrator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //constructor

    public function index()
    {
        // $mgClient = new Mailgun('d28881457d3002e69168a06a1d4f3bc5-d1a07e51-bc9b524e');
        // $domain = "sandboxbcf29f4b57684ea59f461fe341b68eda.mailgun.org";
       

        $mgClient = Mailgun::create('d28881457d3002e69168a06a1d4f3bc5-d1a07e51-bc9b524e');
        $domain = "sandboxbcf29f4b57684ea59f461fe341b68eda.mailgun.org";
        $params = array(
          'from'    => 'ga17033@ues.edu.sv',
          'to'      => 'cs11004@ues.edu.sv',
          'subject' => 'Hello',
          'text'    => 'Testing some Mailgun awesomness!'
        );
        
        # Make the call to the client.
        $mgClient->messages()->send($domain, $params);
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
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->estado = 1;
        if ($user->save()) {
            return Response::respuesta(Response::retOK, $user);
        } else {
            return Response::respuesta(Response::retError, $user);
        }
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
