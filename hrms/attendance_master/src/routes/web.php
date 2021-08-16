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

// employee attendance details routes

$router->get("/attendance_details","AttendanceDetailsApi@index");

$router->get("/attendance_details/{id}","AttendanceDetailsApi@show");

$router->post("/attendance_details","AttendanceDetailsApi@store");

$router->put("/attendance_details/{id}","AttendanceDetailsApi@update");

$router->delete("/attendance_details/{id}","AttendanceDetailsApi@destroy");

// employee leaves routes

$router->get("/emp-leaves","EmployeeLeavesApi@index");

$router->get("/emp-leaves/{id}","EmployeeLeavesApi@show");

$router->post("/emp-leaves","EmployeeLeavesApi@store");

$router->put("/emp-leaves/{id}","EmployeeLeavesApi@update");

$router->delete("/emp-leaves/{id}","EmployeeLeavesApi@destroy");

// employee salary routes

$router->get("/emp-salary","EmployeeSalaryApi@index");

$router->get("/emp-salary/{id}","EmployeeSalaryApi@show");

$router->post("/emp-salary","EmployeeSalaryApi@store");

$router->put("/emp-salary/{id}","EmployeeSalaryApi@update");

$router->delete("/emp-salary/{id}","EmployeeSalaryApi@destroy");
