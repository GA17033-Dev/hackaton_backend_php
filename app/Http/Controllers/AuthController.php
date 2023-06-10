<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    /**
     *
     *  @OA\Post(path="/auth/login",
     *     tags={"Autenticar"},
     *     description="Permite autenticarse y devuelve jwt token para autorizar acceso a endpoints protegidos.",
     *     summary="Login",
     *     operationId="autenticar_update",
     *     @OA\Response(
     *         response="200",
     *         description="Se ha iniciado sesión conrrectamente",
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
     *             @OA\Property(
     *                 property="email",
     *                 description="Número de teléfono",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="password",
     *                 description="Cláve de ingreso al sistema",
     *                 type="string"
     *             ),
     *         )
     *     )
     *  )
     * )
     */
     
    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if ($user == null || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => "Usuario no encontrado. Verifique sus credenciales.",
            ], 401);
        }
        $credentials = $request->only(['email', 'password']);

        //$credentials = $request->only('telefono', 'password');
        try {
            if (!$token = Auth::attempt($credentials)) {
                return response()->json([
                    'message' => "Unauthorized.",
                ], 401);
            }
        } catch (Error $e) {
            return response()->json([
                'message' => "Error de Servidor.",
            ], 500);
        }
        $token = auth()->login($user);
        return response()->json([
            'token_type' => 'Bearer',
            'user' => $user,
            'access_token' => $token,
            'expires_in' => Auth::factory()->getTTL() * 60,
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }
}
