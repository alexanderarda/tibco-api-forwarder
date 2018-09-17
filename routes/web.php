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


$router->group(['prefix' => 'balance'], function () use ($router) {


    # GET
    $router->get('/inquiry/{accNo}', 'ApiController@getBalance');
    $router->get('/history/{accNo}', 'ApiController@getHistory');

    # POST
    $router->post('/inquiry', 'ApiController@postBalance');
    $router->post('/history', 'ApiController@postHistory');

    # DELETE
    $router->delete('/inquiry/delete/{id}', 'ApiController@deleteBalance');

    # OPTIONS
    $router->options('/inquiry/{accNo}', 'ApiController@optionsBalance');

    # HEAD
    $router->head('/inquiry/{accNo}', 'ApiController@headBalance');

    # POST
    $router->post('/inquiry', 'ApiController@postBalance');
    $router->post('/history', 'ApiController@postHistory');

    # PUT
    $router->put('/inquiry', 'ApiController@putBalance');

    # PATCH
    $router->patch('/inquiry', 'ApiController@patchBalance');



});
