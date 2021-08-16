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

$router->get("/testing",function(){
    return view("testing");
});

// interview schedule routes

$router->get("/interview-schedule","InterviewScheduleApi@index");

$router->get("/interview-schedule/{id}","InterviewScheduleApi@show");

$router->post("/interview-schedule","InterviewScheduleApi@store");

$router->put("/interview-schedule/{id}","InterviewScheduleApi@update");

$router->delete("/interview-schedule/{id}","InterviewScheduleApi@destroy");

// interview type routes

$router->get("/interview-type","InterviewTypesApi@index");

$router->get("/interview-type/{id}","InterviewTypesApi@show");

$router->post("/interview-type","InterviewTypesApi@store");

$router->put("/interview-type/{id}","InterviewTypesApi@update");

$router->delete("/interview-type/{id}","InterviewTypesApi@destroy");


// interview details routes

$router->get("/interview-details","InterviewDetailsApi@index");

$router->get("/interview-details/{id}","InterviewDetailsApi@show");

$router->post("/interview-details","InterviewDetailsApi@store");

$router->put("/interview-details/{id}","InterviewDetailsApi@update");

$router->delete("/interview-details/{id}","InterviewDetailsApi@destroy");

// candidate interview schedule routes

$router->get("/candidate-interview-schedule","CandidateInterviewScheduleApi@index");

$router->get("/candidate-interview-schedule/{id}","CandidateInterviewScheduleApi@show");

$router->post("/candidate-interview-schedule","CandidateInterviewScheduleApi@store");

$router->put("/candidate-interview-schedule/{id}","CandidateInterviewScheduleApi@update");

$router->delete("/candidate-interview-schedule/{id}","CandidateInterviewScheduleApi@destroy");

// candidate interview result routes

$router->get("/candidate-interview-result","CandidateInterviewResultApi@index");

$router->get("/candidate-interview-result/{id}","CandidateInterviewResultApi@show");

$router->post("/candidate-interview-result","CandidateInterviewResultApi@store");

$router->put("/candidate-interview-result/{id}","CandidateInterviewResultApi@update");

$router->delete("/candidate-interview-result/{id}","CandidateInterviewResultApi@destroy");

$router->get("/parameter","ParameterMasterApi@index");

$router->get("/parameter/{id}","ParameterMasterApi@show");

$router->post("/parameter","ParameterMasterApi@store");

$router->put("/parameter/{id}","ParameterMasterApi@update");

$router->delete("/parameter/{id}","ParameterMasterApi@destroy");
