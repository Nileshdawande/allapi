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

$router->get("/lead","lead_api@index");

$router->get("/lead/{lead_id}","lead_api@show");

$router->post("/lead","lead_api@store");

$router->put("/lead/{lead_id}","lead_api@update");

$router->delete("/lead/{lead_id}","lead_api@destroy");