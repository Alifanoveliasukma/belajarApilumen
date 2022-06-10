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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/test', "TestController@test");
$router->get('/books', 'TestController@books');
$router->post('/books', 'TestController@create');
$router->get('/books/{id}', 'TestController@getById');
$router->post('/books/update', 'TestController@update');
$router->post('/books/delete', 'TestController@delete');

$router->get('/penerbit', 'PenerbitController@index');
