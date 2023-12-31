<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Response;
//use DB
use Illuminate\Support\Facades\DB;

class CatalogoController extends Controller
{


        /**
     *
     *  @OA\Get(path="/api/catalogo/roles",
     *     tags={"Catalogos"},
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
        $roles = DB::table('roles')->get();
        return Response::respuesta(Response::retOK, $roles);
    }

    /**
     *
     *  @OA\Get(path="/api/catalogo/paises",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de los paises",
     *     operationId="paisesid",
     *     summary="Muestra los paises",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los paises",
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
    public function paises()
    {
        $paises = DB::table('pais')->get();
        return Response::respuesta(Response::retOK, $paises);
    }


    /**
     *
     *  @OA\Get(path="/api/catalogo/departamentos",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de los departamentos",
     *     operationId="departamentosid",
     *     summary="Muestra los departamentos",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los departamentos",
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

    public function departamentos()
    {
        $departamentos = DB::table('departamento')->get();

        return Response::respuesta(Response::retOK, $departamentos);
    }

    /**
     *
     *  @OA\Get(path="/api/catalogo/municipios",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de los municipios",
     *     operationId="municipiosid",
     *     summary="Muestra los municipios",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los municipios",
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
    public function municipios()
    {
        $departamentos = DB::table('municipios')->join('departamento', 'departamento.departamento_id', '=', 'municipios.departamento_id')->get();

        return Response::respuesta(Response::retOK, $departamentos);
    }

    /**
     *
     *  @OA\Get(path="/api/catalogo/departamento/get/by/id/{id}",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el departamento por id",
     *     summary="Muestra los municipios por id de departamento",
     *     operationId="departamentogetbyid",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del departamento",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los municipios por id de departamento",
     *         @OA\JsonContent(
     *              @OA\Property(property ="resultado",type="string",description="Estado de resultado"),
     *              @OA\Property(
     *                  property="datos",
     *                  description="Datos del resultado de la api",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(property ="id",type="integer",description="Id de rol"),
     *                      @OA\Property(property ="rol_nombre",type="string",description="Nombre del rol"),
     *                      @OA\Property(property ="rol",type="string",description="Nombre del rol strtolower"),
     *                  ),
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


    public function municipiosById($id)
    {
        $departamentos = DB::table('municipios')->where('departamento_id', $id)->get();

        return Response::respuesta(Response::retOK, $departamentos);
    }



    /**
     *
     *  @OA\Get(path="/api/catalogo/generos",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de los generos",
     *     operationId="generos",
     *     summary="Muestra los generos",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los generos",
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

    public function generos()
    {
        $generos = DB::table('generos')->get();

        return Response::respuesta(Response::retOK, $generos);
    }


    /**
     *
     *  @OA\Get(path="/api/catalogo/especialidades",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de las especialidades",
     *     operationId="especialidades",
     *     summary="Muestra las especialidades",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de las especialidades",
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

    public function especialidades()
    {
        $especialidades = DB::table('especialidades')->get();

        return Response::respuesta(Response::retOK, $especialidades);
    }




    /**
     *
     *  @OA\Get(path="/api/catalogo/consultorios",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de los consultorios",
     *     operationId="consultorios",
     *     summary="Muestra los consultorios",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los consultorios",
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


    public function consultorios()
    {
        $consultorios = DB::table('establecimientos_medicos')->get();

        return Response::respuesta(Response::retOK, $consultorios);
    }




    public function medicos()
    {
        $medicos = DB::table('Medicos')
            ->join('Usuarios', 'Medicos.idusuario', '=', 'Usuarios.idusuario')
            ->select('Medicos.*', 'Usuarios.idrol', 'Usuarios.idgenero', 'Usuarios.nombre', 'Usuarios.apellido', 'Usuarios.usuario', 'Usuarios.edad', 'Usuarios.email', 'Usuarios.telefono', 'Usuarios.activo', 'Usuarios.created_at', 'Usuarios.updated_at')
            ->get();

        return Response::respuesta(Response::retOK, $medicos);
    }


    public function byEspecialidad($id_especialidad)
    {
        $medicos = DB::table('Medicos')
            ->join('Usuarios', 'Medicos.idusuario', '=', 'Usuarios.idusuario')
            ->join('Especialidades', 'Medicos.idespecialidad', '=', 'Especialidades.idespecialidad')
            ->select('Especialidades.*', 'Medicos.*', 'Usuarios.idrol', 'Usuarios.idgenero', 'Usuarios.nombre', 'Usuarios.apellido', 'Usuarios.usuario', 'Usuarios.edad', 'Usuarios.email', 'Usuarios.telefono', 'Usuarios.activo', 'Usuarios.created_at', 'Usuarios.updated_at')
            ->where('Medicos.idespecialidad', '=', $id_especialidad)
            ->get();

        return Response::respuesta(Response::retOK, $medicos);
    }



    /**
     *
     *  @OA\Get(path="/api/catalogo/tipos/sangre",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de los tipos de sangre",
     *     operationId="tipos/sangre",
     *     summary="Muestra los tipos de sangre",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los tipos de sangre",
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

    public function tiposSangre()
    {
        $tiposSangre = DB::table('tipo_sangre')->get();

        return Response::respuesta(Response::retOK, $tiposSangre);
    }



    /**
     *
     *  @OA\Get(path="/api/catalogo/tipos/enfermedades",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de los tipos de enfermedades",
     *     operationId="tipos/enfermedades",
     *     summary="Muestra los tipos de enfermedades",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los tipos de enfermedades",
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

    public function enfermedades()
    {
        $enfermedades = DB::table('enfermedades')->get();

        return Response::respuesta(Response::retOK, $enfermedades);
    }


    /**
     *
     *  @OA\Get(path="/api/catalogo/gravedad/enfermedades",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve los tipos de gravedad de las enfermedades",
     *     operationId="gravedad/enfermedades",
     *     summary="Muestra los tipos de gravedad de las enfermedades",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los tipos de gravedad de las enfermedades",
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

    public function gravedad_enfermedades()
    {
        $gravedad_enfermedades = DB::table('gravedad_enfermedades')->get();

        return Response::respuesta(Response::retOK, $gravedad_enfermedades);
    }



    /**
     *
     *  @OA\Get(path="/api/catalogo/medicamentos",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de los medicamentos",
     *     operationId="medicamentos",
     *     summary="Muestra los medicamentos",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los medicamentos",
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


    public function medicamentos()
    {
        $medicamentos = DB::table('medicamentos')->get();

        return Response::respuesta(Response::retOK, $medicamentos);
    }


    /**
     *
     *  @OA\Get(path="/api/catalogo/parentescos",
     *     tags={"Catalogos"},
     *     security={
     *          {"token": {}},
     *     },
     *     description="Devuelve el listado de los parentescos",
     *     operationId="parentescos",
     *     summary="Muestra los parentescos",
     *     @OA\Response(
     *         response="200",
     *         description="Retorna el listado de los parentescos",
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

    public function parentesco()
    {
        $parentesco = DB::table('catalogo_parentesco')->get();

        return Response::respuesta(Response::retOK, $parentesco);
    }


    
}
