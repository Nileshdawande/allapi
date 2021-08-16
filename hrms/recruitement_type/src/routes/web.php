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

$router->get("/recruitment","recruitment_api@index");

$router->get("/recruitment/{rec_id}","recruitment_api@show");

$router->post("/recruitment","recruitment_api@store");

$router->put("/recruitment/{rec_id}","recruitment_api@update");

$router->delete("/recruitment/{rec_id}","recruitment_api@destroy");


// Recruitment request routes


$router->get("/recruitment_request","recruitment_request_api@index");

$router->get("/recruitment_request/{rec_id}","recruitment_request_api@show");

$router->post("/recruitment_request","recruitment_request_api@store");

$router->put("/recruitment_request/{rec_id}","recruitment_request_api@update");

$router->delete("/recruitment_request/{rec_id}","recruitment_request_api@destroy");


// Recruitment request wise candidate routes

$router->get("/recruitment_request_candidate","recruitment_request_candidate_api@index");

$router->get("/recruitment_request_candidate/{rec_id}","recruitment_request_candidate_api@show");

$router->post("/recruitment_request_candidate","recruitment_request_candidate_api@store");

$router->put("/recruitment_request_candidate/{rec_id}","recruitment_request_candidate_api@update");

$router->delete("/recruitment_request_candidate/{rec_id}","recruitment_request_candidate_api@destroy");
