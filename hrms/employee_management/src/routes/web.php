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

// softlabs branch master routes

$router->get("/softlabs-branch-master","SoftlabsBranchMasterApi@index");

$router->get("/softlabs-branch-master/{id}","SoftlabsBranchMasterApi@show");

$router->post("/softlabs-branch-master","SoftlabsBranchMasterApi@store");

$router->put("/softlabs-branch-master/{id}","SoftlabsBranchMasterApi@update");

$router->delete("/softlabs-branch-master/{id}","SoftlabsBranchMasterApi@destroy");


// softlabs office master routes

$router->get("/softlabs-office-master","SoftlabsOfficeMasterApi@index");

$router->get("/softlabs-office-master/{id}","SoftlabsOfficeMasterApi@show");

$router->post("/softlabs-office-master","SoftlabsOfficeMasterApi@store");

$router->put("/softlabs-office-master/{id}","SoftlabsOfficeMasterApi@update");

$router->delete("/softlabs-office-master/{id}","SoftlabsOfficeMasterApi@destroy");


// branch office master routes

$router->get("/branch-office-master","BranchOfficeMasterApi@index");

$router->get("/branch-office-master/{id}","BranchOfficeMasterApi@show");

$router->post("/branch-office-master","BranchOfficeMasterApi@store");

$router->put("/branch-office-master/{id}","BranchOfficeMasterApi@update");

$router->delete("/branch-office-master/{id}","BranchOfficeMasterApi@destroy");


// employee type master routes

$router->get("/employee-type-master","EmployeeTypeMasterApi@index");

$router->get("/employee-type-master/{id}","EmployeeTypeMasterApi@show");

$router->post("/employee-type-master","EmployeeTypeMasterApi@store");

$router->put("/employee-type-master/{id}","EmployeeTypeMasterApi@update");

$router->delete("/employee-type-master/{id}","EmployeeTypeMasterApi@destroy");

// employee department master routes

$router->get("/employee-department","EmployeeDepartmentApi@index");

$router->get("/employee-department/{id}","EmployeeDepartmentApi@show");

$router->post("/employee-department","EmployeeDepartmentApi@store");

$router->put("/employee-department/{id}","EmployeeDepartmentApi@update");

$router->delete("/employee-department/{id}","EmployeeDepartmentApi@destroy");


// employee designation master routes

$router->get("/employee-designation","EmployeeDesignationApi@index");

$router->get("/employee-designation/{id}","EmployeeDesignationApi@show");

$router->post("/employee-designation","EmployeeDesignationApi@store");

$router->put("/employee-designation/{id}","EmployeeDesignationApi@update");

$router->delete("/employee-designation/{id}","EmployeeDesignationApi@destroy");


// employee salary head routes

$router->get("/salary-head","SalaryHeadApi@index");

$router->get("/salary-head/{id}","SalaryHeadApi@show");

$router->post("/salary-head","SalaryHeadApi@store");

$router->put("/salary-head/{id}","SalaryHeadApi@update");

$router->delete("/salary-head/{id}","SalaryHeadApi@destroy");

// employee master routes

$router->get("/emp-master","EmployeeMasterApi@index");

$router->get("/emp-master/{id}","EmployeeMasterApi@show");

$router->post("/emp-master","EmployeeMasterApi@store");

$router->put("/emp-master/{id}","EmployeeMasterApi@update");

$router->delete("/emp-master/{id}","EmployeeMasterApi@destroy");

// employee allocation head routes

$router->get("/emp-allocation","EmployeeAllocationHeadApi@index");

$router->get("/emp-allocation/{id}","EmployeeAllocationHeadApi@show");

$router->post("/emp-allocation","EmployeeAllocationHeadApi@store");

$router->put("/emp-allocation/{id}","EmployeeAllocationHeadApi@update");

$router->delete("/emp-allocation/{id}","EmployeeAllocationHeadApi@destroy");

// employee allocation salary details

$router->get("/emp-allocation-details","EmplyeeAlocationSalaryDetailsApi@index");

$router->get("/emp-allocation-details/{id}","EmplyeeAlocationSalaryDetailsApi@show");

$router->post("/emp-allocation-details","EmplyeeAlocationSalaryDetailsApi@store");

$router->put("/emp-allocation-details/{id}","EmplyeeAlocationSalaryDetailsApi@update");

$router->delete("/emp-allocation-details/{id}","EmplyeeAlocationSalaryDetailsApi@destroy");


// employee leave type master routes

$router->get("/emp-leave-master","LeaveTypeMasterApi@index");

$router->get("/emp-leave-master/{id}","LeaveTypeMasterApi@show");

$router->post("/emp-leave-master","LeaveTypeMasterApi@store");

$router->put("/emp-leave-master/{id}","LeaveTypeMasterApi@update");

$router->delete("/emp-leave-master/{id}","LeaveTypeMasterApi@destroy");

// company annual leave master routes

$router->get("/cmp-leave-master","CmpAnnualLeaveMasterApi@index");

$router->get("/cmp-leave-master/{id}","CmpAnnualLeaveMasterApi@show");

$router->post("/cmp-leave-master","CmpAnnualLeaveMasterApi@store");

$router->put("/cmp-leave-master/{id}","CmpAnnualLeaveMasterApi@update");

$router->delete("/cmp-leave-master/{id}","CmpAnnualLeaveMasterApi@destroy");

// employee annual leave master routes

$router->get("/emp-annual-leave-master","EmpAnnualLeaveMasterApi@index");

$router->get("/emp-annual-leave-master/{id}","EmpAnnualLeaveMasterApi@show");

$router->post("/emp-annual-leave-master","EmpAnnualLeaveMasterApi@store");

$router->put("/emp-annual-leave-master/{id}","EmpAnnualLeaveMasterApi@update");

$router->delete("/emp-annual-leave-master/{id}","EmpAnnualLeaveMasterApi@destroy");
