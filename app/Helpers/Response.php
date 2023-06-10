<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Response
{

    const retOK = 'OK';
    const retError = "ERROR";
    const retNotFound = "NOTFOUND";

    public static function respuesta($resultado, $datos, $cache = false): \Illuminate\Http\JsonResponse
    {
        $codigo = 200;
        if (is_null($resultado)){
            $resultado = empty($datos) ? self::retError : self::retOK;
        }

        if ($resultado === self::retError) {
            $codigo = 400;
        }

        $response = response()->json([
            'resultado' => $resultado,
            'datos' => $datos,
            'entregado' => date('Y-m-d H:i:s e'),
        ], $codigo);

        return $response;
    }


}