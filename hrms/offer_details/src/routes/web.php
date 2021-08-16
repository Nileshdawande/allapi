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

$router->get("/offer-details","offerDetailsApi@index");

$router->get("/offer-details/{id}","offerDetailsApi@show");

$router->post("/offer-details","offerDetailsApi@store");

$router->put("/offer-details/{id}","offerDetailsApi@update");

$router->delete("/offer-details/{id}","offerDetailsApi@destroy");
