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

// task type master routes

Route::get("/task-type-master","TaskTypeMasterApi@index");

Route::post("/task-type-master","TaskTypeMasterApi@store");

Route::get("/task-type-master/{id}","TaskTypeMasterApi@show");

Route::put("/task-type-master/{id}","TaskTypeMasterApi@update");

Route::delete("/task-type-master/{id}","TaskTypeMasterApi@destroy");

// task status master routes

Route::get("/task-status-master","TaskStatusMasterApi@index");

Route::post("/task-status-master","TaskStatusMasterApi@store");

Route::get("/task-status-master/{id}","TaskStatusMasterApi@show");

Route::put("/task-status-master/{id}","TaskStatusMasterApi@update");

Route::delete("/task-status-master/{id}","TaskStatusMasterApi@destroy");



// task  master routes

Route::get("/pms-task","TaskApi@index");

Route::post("/pms-task","TaskApi@store");

Route::get("/pms-task/{id}","TaskApi@show");

Route::put("/pms-task/{id}","TaskApi@update");

Route::delete("/pms-task/{id}","TaskApi@destroy");

// comments routes

Route::get("/comment","CommentApi@index");

Route::post("/comment","CommentApi@store");

Route::get("/comment/{id}","CommentApi@show");

Route::put("/comment/{id}","CommentApi@update");

Route::delete("/comment/{id}","CommentApi@destroy");
