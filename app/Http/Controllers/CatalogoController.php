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
     *  @OA\Get(path="/api/paises",
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
     *  @OA\Get(path="/api/departamentos",
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
        $departamentos = DB::table('Departamentos')->join('pais', 'pais.id', '=', 'Departamentos.id_pais')->get();

        return Response::respuesta(Response::retOK, $departamentos);
    }

    /**
     *
     *  @OA\Get(path="/api/municipios",
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
        $departamentos = DB::table('Municipios')->join('Departamentos', 'Departamentos.iddepartamento', '=', 'Municipios.iddepartamento')->get();

        return Response::respuesta(Response::retOK, $departamentos);
    }

    /**
     *
     *  @OA\Get(path="/api/departamento/get/by/id/{id}",
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
        $departamentos = DB::table('Departamentos')->join('Municipios', 'Municipios.iddepartamento', '=', 'Departamentos.iddepartamento')->where('Departamentos.iddepartamento', $id)->get();

        return Response::respuesta(Response::retOK, $departamentos);
    }



    /**
     *
     *  @OA\Get(path="/api/generos",
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
        $generos = DB::table('Generos')->get();

        return Response::respuesta(Response::retOK, $generos);
    }
}
