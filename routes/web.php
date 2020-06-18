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

$router->get('/mahasiswa', 'MahasiswaController@index');
$router->get('/mahasiswa/{id}', 'MahasiswaCOntroller@show');
$router->post('/mahasiswa', 'MahasiswaCOntroller@store');
$router->put('/mahasiswa/{id}', 'MahasiswaCOntroller@update');
$router->delete('/mahasiswa/{mahasiswa}', 'MahasiswaCOntroller@destroy');
