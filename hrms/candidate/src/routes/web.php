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

// candidate master routes

$router->get("/candidate-master","CandidateMasterApi@index");

$router->get("/candidate-master/{id}","CandidateMasterApi@show");

$router->post("/candidate-master","CandidateMasterApi@store");

$router->put("/candidate-master/{id}","CandidateMasterApi@update");

$router->delete("/candidate-master/{id}","CandidateMasterApi@destroy");

// candidate skill routes

$router->get("/candidate-skill","CandidateSkillApi@index");

$router->get("/candidate-skill/{id}","CandidateSkillApi@show");

$router->post("/candidate-skill","CandidateSkillApi@store");

$router->put("/candidate-skill/{id}","CandidateSkillApi@update");

$router->delete("/candidate-skill/{id}","CandidateSkillApi@destroy");
