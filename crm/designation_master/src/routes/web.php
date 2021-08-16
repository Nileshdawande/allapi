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

$router->get("/designation","designationApi@index");

$router->get("/designation/{designation_id}","designationApi@show");

$router->post("/designation","designationApi@store");

$router->put("/designation/{designation_id}","designationApi@update");

$router->delete("/designation/{designation_id}","designationApi@destroy");

// lead category routes

$router->get("/category","leadSourceCategoryApi@index");

$router->post("/category","leadSourceCategoryApi@store");

$router->get("/category/{id}","leadSourceCategoryApi@show");

$router->put("/category/{id}","leadSourceCategoryApi@update");

$router->delete("/category/{id}","leadSourceCategoryApi@destroy");

// company type routes

$router->get("/cmptype","company_type_api@index");

$router->get("/cmptype/{id}","company_type_api@show");

$router->post("/cmptype","company_type_api@store");

$router->put("/cmptype/{id}","company_type_api@update");

$router->delete("/cmptype/{id}","company_type_api@destroy");

// contract routes

$router->get("/contract","contract_api@index");

$router->get("/contract/{contract_id}","contract_api@show");

$router->post("/contract/","contract_api@store");

$router->put("/contract/{contract_id}","contract_api@update");

$router->delete("/contract/{contract_id}","contract_api@destroy");

// department routes

$router->get("/dipartment","dipartmentApi@index");

$router->get("/dipartment/{dipartment_id}","dipartmentApi@show");

$router->post("/dipartment/","dipartmentApi@store");

$router->put("/dipartment/{dipartment_id}","dipartmentApi@update");

$router->delete("/dipartment/{dipartment_id}","dipartmentApi@destroy");

// interaction routes

$router->get("/interaction","interaction_api@index");

$router->get("/interaction/{interaction_id}","interaction_api@show");

$router->post("/interaction","interaction_api@store");

$router->put("/interaction/{interaction_id}","interaction_api@update");

$router->delete("/interaction/{interaction_id}","interaction_api@destroy");

// lead followup routes

$router->get("/followup","followup_api@index");

$router->get("/followup/{followup_id}","followup_api@show");

$router->post("/followup/","followup_api@store");

$router->put("/followup/{followup_id}","followup_api@update");

$router->delete("/followup/{followup_id}","followup_api@destroy");

// lead source routes

$router->get("/lead_source","lead_source_api@index");

$router->get("/lead_source/{lead_id}","lead_source_api@show");

$router->post("/lead_source","lead_source_api@store");

$router->put("/lead_source/{lead_id}","lead_source_api@update");

$router->delete("/lead_source/{lead_id}","lead_source_api@destroy");

// lead status routes

$router->get("/lead_status","lead_status_api@index");

$router->get("/lead_status/{lead_id}","lead_status_api@show");

$router->post("/lead_status","lead_status_api@store");

$router->put("/lead_status/{lead_id}","lead_status_api@update");

$router->delete("/lead_status/{lead_id}","lead_status_api@destroy");

// project master routes

$router->get("/project","project_api@index");

$router->get("/project/{project_id}","project_api@show");

$router->post("/project/","project_api@store");

$router->put("/project/{project_id}","project_api@update");

$router->delete("/project/{project_id}","project_api@destroy");

// requirements routes

$router->get("/requirement","requirementApi@index");

$router->get("/requirement/{req_id}","requirementApi@show");

$router->post("/requirement","requirementApi@store");

$router->put("/requirement/{req_id}","requirementApi@update");

$router->delete("/requirement/{req_id}","requirementApi@destroy");
