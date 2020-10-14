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

$router->get('/biodata', function (){
    return 'Nama: Amelia Qatrunnada, NIM: 185150701111014';
});

$router->get('hai/{name}', function($name){
    return 'Hai, '. $name;
});

//read data
$router->get('/products', 'ProductController@index');
$router->get('/products/{id}', 'ProductController@show');

//create data
$router->post('/products', 'ProductController@store');

//delete data
$router->delete('/products/{id}', 'ProductController@destroy');

//update data
$router->put('/products/{id}', 'ProductController@update');




