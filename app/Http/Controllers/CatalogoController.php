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
}
