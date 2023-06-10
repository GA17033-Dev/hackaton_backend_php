<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
     /**
     * @OA\Info( title="API Plantilla", version="1.0",
     *   description="Backend Documentación"
     * ),
     * @OA\SecurityScheme(
     *      securityScheme="token",
     *      type="apiKey",
     *      name="Authorization",
     *      in="header"
     *     ),
     */

}
