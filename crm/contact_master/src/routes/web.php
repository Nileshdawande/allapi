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

$router->get("/contact","contact_api@index");

$router->get("/contact/{contact_id}","contact_api@show");

$router->post("/contact","contact_api@store");

$router->put("/contact/{contact_id}","contact_api@update");

$router->delete("/contact/{contact_id}","contact_api@destroy");


