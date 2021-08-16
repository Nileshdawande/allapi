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


$router->get("/skill-masters","skill_master_api@index");

$router->get("/skill-masters/{skill_id}","skill_master_api@show");

$router->post("/skill-masters/","skill_master_api@store");

$router->put("/skill-masters/{skill_id}","skill_master_api@update");

$router->delete("/skill-masters/{skill_id}","skill_master_api@destroy");

// technology master routes

$router->get("/technology-master","technology_master_api@index");

$router->get("/technology-master/{technology_id}","technology_master_api@show");

$router->post("/technology-master/","technology_master_api@store");

$router->put("/technology-master/{technology_id}","technology_master_api@update");

$router->delete("/technology-master/{technology_id}","technology_master_api@destroy");


// technology wise skills routes

$router->get("/technology-skill","technology_with_skill_api@index");

$router->get("/technology-skill/{technology_id}","technology_with_skill_api@show");

$router->post("/technology-skill/","technology_with_skill_api@store");

$router->put("/technology-skill/{technology_id}","technology_with_skill_api@update");

$router->delete("/technology-skill/{technology_id}","technology_with_skill_api@destory");
