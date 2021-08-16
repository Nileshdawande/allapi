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

$router->get("/company","company_api@index");

$router->get("/company/{company_id}","company_api@show");

$router->post("/company","company_api@store");

$router->put("/company/{company_id}","company_api@update");

$router->delete("/company/{company_id}","company_api@destroy");
