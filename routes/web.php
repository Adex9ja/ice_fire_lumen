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



$router->get('/', 'IceFireController@index');

$router->get('/api/external-books', 'IceFireController@getExternalBooks');

$router->group( ['prefix' => '/api/v1/books'], function () use ($router) {
    $router->get('/', 'BookController@index');
    $router->post('/', 'BookController@store');
    $router->get('/{id:[\d]+}', 'BookController@show');
    $router->patch('/{id:[\d]+}', 'BookController@update');
    $router->delete('/{id:[\d]+}', 'BookController@destroy');
});


