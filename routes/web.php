<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->group([

    // 'middleware' => 'api',
    'prefix' => 'auth',

], function ($router) {

    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');
});
/**
 * Inicio de endpoints de la api que hacen referencia a los catalogos
 */


$router->get('api/catalogo/roles', 'UserController@index');
$router->get('api/catalogo/paises', 'CatalogoController@paises');
$router->get('api/catalogo/departamentos', 'CatalogoController@departamentos');
$router->get('api/catalogo/municipios', 'CatalogoController@municipios');
$router->get('api/catalogo/departamento/get/by/id/{id}', 'CatalogoController@municipiosById');
$router->get('api/catalogo/generos', 'CatalogoController@generos');
$router->get('api/catalogo/especialidades', 'CatalogoController@especialidades');
$router->get('api/catalogo/consultorios', 'CatalogoController@consultorios');
$router->get('api/catalogo/medicos', 'CatalogoController@medicos');
$router->get('api/catalogo/medicos/especialidad/{id_especialidad}', 'CatalogoController@byEspecialidad');
$router->get('api/catalogo/tipos/sangre', 'CatalogoController@tiposSangre');
$router->get('api/catalogo/tipos/enfermedades', 'CatalogoController@enfermedades');
$router->get('api/catalogo/gravedad/enfermedades', 'CatalogoController@gravedad_enfermedades');
$router->get('api/catalogo/medicamentos', 'CatalogoController@medicamentos');
$router->get('api/catalogo/parentescos', 'CatalogoController@parentesco');


/**
 * Fin de endpoints de la api que hacen referencia a los catalogos
 */

///api/register/paciente
$router->post('api/register/paciente', 'PacienteController@register');
$router->post('api/register/user', 'UserController@store');

$router->get('email/test', 'UserController@index');
$router->get('usuario/profile', ['middleware' => 'Auth', 'uses' => 'UserController@profile']);

$router->get('/', function () use ($router) {
    return 'Api Rest';
});
$router->post('api/paciente/register/enfermedades', ['middleware' => 'Auth', 'uses' => 'PacienteController@enfermedades_paciente']);
$router->get('api/paciente/obtener/enfermedades', ['middleware' => 'Auth', 'uses' => 'PacienteController@obtener_enfermedades_paciente']);
$router->put('api/paciente/editar/enfermedades/{id}', ['middleware' => 'Auth', 'uses' => 'PacienteController@editar_enfermedades_paciente']);
$router->delete('api/paciente/eliminar/enfermedades/{id}', ['middleware' => 'Auth', 'uses' => 'PacienteController@eliminar_enfermedades_paciente']);
$router->post('api/paciente/register/tipo/sangre', ['middleware' => 'Auth', 'uses' => 'PacienteController@register_tipo_sangre']);
$router->post('api/paciente/register/parientes', ['middleware' => 'Auth', 'uses' => 'PacienteController@register_parientes']);
$router->put('api/paciente/editar/parientes/{id}', ['middleware' => 'Auth', 'uses' => 'PacienteController@editar_parientes']);
$router->get('api/paciente/obtener/parientes', ['middleware' => 'Auth', 'uses' => 'PacienteController@obtener_parientes']);