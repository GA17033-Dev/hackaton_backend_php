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

$router->post('api/register/user', 'UserController@store');
$router->get('api/roles', 'UserController@index');
$router->get('api/paises', 'CatalogoController@paises');
$router->get('api/departamentos', 'CatalogoController@departamentos');
$router->get('api/municipios', 'CatalogoController@municipios');
$router->get('api/departamento/get/by/id/{id}', 'CatalogoController@municipiosById');
$router->get('api/generos', 'CatalogoController@generos');
$router->get('api/especialidades', 'CatalogoController@especialidades');
$router->get('api/consultorios', 'CatalogoController@consultorios');
$router->get('api/medicos', 'CatalogoController@medicos');
$router->get('api/medicos/especialidad/{id_especialidad}', 'CatalogoController@byEspecialidad');
$router->get('api/tipos/sangre', 'CatalogoController@tiposSangre');
$router->get('api/tipos/enfermedades', 'CatalogoController@enfermedades');
$router->get('api/gravedad/enfermedades', 'CatalogoController@gravedad_enfermedades');
$router->get('api/medicamentos', 'CatalogoController@medicamentos');

$router->get('api/parentescos', 'CatalogoController@parentesco');


/**
 * Fin de endpoints de la api que hacen referencia a los catalogos
 */

///api/register/paciente
$router->post('api/register/paciente', 'PacienteController@register');

$router->get('email/test', 'UserController@index');
$router->get('usuario/profile', ['middleware' => 'Auth', 'uses' => 'UserController@profile']);

$router->get('/', function () use ($router) {
    return 'Api Rest';
});
$router->post('api/register/enfermedades', ['middleware' => 'Auth', 'uses' => 'PacienteController@enfermedades_paciente']);
$router->get('api/obtener/enfermedades/paciente', ['middleware' => 'Auth', 'uses' => 'PacienteController@obtener_enfermedades_paciente']);
$router->put('api/editar/enfermedades/paciente/{id}', ['middleware' => 'Auth', 'uses' => 'PacienteController@editar_enfermedades_paciente']);
$router->delete('api/eliminar/enfermedades/paciente/{id}', ['middleware' => 'Auth', 'uses' => 'PacienteController@eliminar_enfermedades_paciente']);
$router->post('api/register/tipo/sangre/paciente', ['middleware' => 'Auth', 'uses' => 'PacienteController@register_tipo_sangre']);
