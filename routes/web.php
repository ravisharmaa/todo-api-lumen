<?php

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

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/

$router->get('/users', 'UserController@index');

$router->post('/users', 'UserController@store');
$router->get('/users/{user}', 'UserController@show');

$router->post('users/{id}/todo', 'TodoController@store');
$router->get('/todos', 'TodoController@index');
$router->put('/todos/{id}/update', 'TodoController@update');
$router->delete('/todos/{id}/destroy', 'TodoController@destroy');
