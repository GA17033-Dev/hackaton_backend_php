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
 * Controlador usuario
 */

$router->post('api/register/user', 'UserController@store');
$router->get('api/roles', 'UserController@index');
$router->get('api/paises', 'CatalogoController@paises');
$router->get('api/departamentos', 'CatalogoController@departamentos');
$router->get('api/municipios', 'CatalogoController@municipios');
$router->get('api/departamento/get/by/id/{id}', 'CatalogoController@municipiosById');
$router->get('api/generos', 'CatalogoController@generos');

$router->get('email/test', 'UserController@index');
$router->get('usuario/profile', ['middleware' => 'Auth', 'uses' => 'UserController@profile']);

$router->get('/', function () use ($router) {
    return $router->app->version();
});
