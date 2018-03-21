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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/users', 'UserController@index');
$router->post('/user/store', 'UserController@store');
$router->get('/users/{id}/show', 'UserController@show');

$router->get('/todos', 'TodoController@index');
$router->get('/user/{id}/todos', 'TodoController@show');
$router->post('user/{id}/todo', 'TodoController@store');
$router->put('/todo/{id}/update', 'TodoController@update');
$router->delete('/todo/{id}', 'TodoController@destroy');

