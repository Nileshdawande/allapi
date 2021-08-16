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

// company services routes

$router->get("/company","company_api@index");

$router->get("/company/{company_id}","company_api@show");

$router->post("/company","company_api@store");

$router->put("/company/{company_id}","company_api@update");

$router->delete("/company/{company_id}","company_api@destroy");

// contacts services routes

$router->get("/contact","contact_api@index");

$router->get("/contact/{contact_id}","contact_api@show");

$router->post("/contact","contact_api@store");

$router->put("/contact/{contact_id}","contact_api@update");

$router->delete("/contact/{contact_id}","contact_api@destroy");

// leads master services routes

$router->get("/lead","lead_api@index");

$router->get("/lead/{lead_id}","lead_api@show");

$router->post("/lead","lead_api@store");

$router->put("/lead/{lead_id}","lead_api@update");

$router->delete("/lead/{lead_id}","lead_api@destroy");

// lead source services routes

$router->get("/lead_source","lead_source_api@index");

$router->get("/lead_source/{lead_id}","lead_source_api@show");

$router->post("/lead_source","lead_source_api@store");

$router->put("/lead_source/{lead_id}","lead_source_api@update");

$router->delete("/lead_source/{lead_id}","lead_source_api@destroy");

// requirements services routes

$router->get("/requirement","requirementApi@index");

$router->get("/requirement/{req_id}","requirementApi@show");

$router->post("/requirement","requirementApi@store");

$router->put("/requirement/{req_id}","requirementApi@update");

$router->delete("/requirement/{req_id}","requirementApi@destroy");

// dipartment services routes

$router->get("/dipartment","dipartmentApi@index");

$router->get("/dipartment/{dipartment_id}","dipartmentApi@show");

$router->post("/dipartment/","dipartmentApi@store");

$router->put("/dipartment/{dipartment_id}","dipartmentApi@update");

$router->delete("/dipartment/{dipartment_id}","dipartmentApi@destroy");

// designation services routes

$router->get("/designation","designationApi@index");

$router->get("/designation/{designation_id}","designationApi@show");

$router->post("/designation","designationApi@store");

$router->put("/designation/{designation_id}","designationApi@update");

$router->delete("/designation/{designation_id}","designationApi@destroy");

// lead status services routes

$router->get("/lead_status","lead_status_api@index");

$router->get("/lead_status/{lead_id}","lead_status_api@show");

$router->post("/lead_status","lead_status_api@store");

$router->put("/lead_status/{lead_id}","lead_status_api@update");

$router->delete("/lead_status/{lead_id}","lead_status_api@destroy");

// interaction services routes

$router->get("/interaction","interaction_api@index");

$router->get("/interaction/{interaction_id}","interaction_api@show");

$router->post("/interaction","interaction_api@store");

$router->put("/interaction/{interaction_id}","interaction_api@update");

$router->delete("/interaction/{interaction_id}","interaction_api@destroy");

// followup services routes

$router->get("/followup","followup_api@index");

$router->get("/followup/{followup_id}","followup_api@show");

$router->post("/followup/","followup_api@store");

$router->put("/followup/{followup_id}","followup_api@update");

$router->delete("/followup/{followup_id}","followup_api@destroy");

//  reports services routes

$router->get("/report","report_api@index");

$router->get("/report/{query}","report_api@show");

$router->post("/report","report_api@store");

// contract services routes

$router->get("/contract","contract_api@index");

$router->get("/contract/{contract_id}","contract_api@show");

$router->post("/contract/","contract_api@store");

$router->put("/contract/{contract_id}","contract_api@update");

$router->delete("/contract/{contract_id}","contract_api@destroy");

// project services routes

$router->get("/project","project_api@index");

$router->get("/project/{project_id}","project_api@show");

$router->post("/project/","project_api@store");

$router->put("/project/{project_id}","project_api@update");

$router->delete("/project/{project_id}","project_api@destroy");

// employee education routes

$router->get("/employee-education","employee_education_api@index");

$router->get("/employee-education/{edu_id}","employee_education_api@show");

$router->post("/employee-education","employee_education_api@store");

$router->put("/employee-education/{edu_id}","employee_education_api@update");

$router->delete("/employee-education/{edu_id}","employee_education_api@destroy");

// employee salary routes

$router->get("/employee-salary","employee_salary_api@index");

$router->get("employee-salary/{sal_id}","employee_salary_api@show");

$router->post("/employee-salary","employee_salary_api@store");

$router->put("/employee-salary/{sal_id}","employee_salary_api@update");

$router->delete("/employee-salary/{sal_id}","employee_salary_api@destroy");



// skill master routes

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


// recruitment routes

$router->get("/recruitment","recruitment_api@index");

$router->get("/recruitment/{rec_id}","recruitment_api@show");

$router->post("/recruitment","recruitment_api@store");

$router->put("/recruitment/{rec_id}","recruitment_api@update");

$router->delete("/recruitment/{rec_id}","recruitment_api@destroy");

// recruitment request routes

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

// category master routes

$router->get("/category","leadSourceCategoryApi@index");

$router->post("/category","leadSourceCategoryApi@store");

$router->get("/category/{id}","leadSourceCategoryApi@show");

$router->put("/category/{id}","leadSourceCategoryApi@update");

$router->delete("/category/{id}","leadSourceCategoryApi@destroy");

//  company type master routes

$router->get("/cmptype","company_type_api@index");

$router->get("/cmptype/{id}","company_type_api@show");

$router->post("/cmptype","company_type_api@store");

$router->put("/cmptype/{id}","company_type_api@update");

$router->delete("/cmptype/{id}","company_type_api@destroy");

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

// paramter master routes

$router->get("/parameter","ParameterMasterApi@index");

$router->get("/parameter/{id}","ParameterMasterApi@show");

$router->post("/parameter","ParameterMasterApi@store");

$router->put("/parameter/{id}","ParameterMasterApi@update");

$router->delete("/parameter/{id}","ParameterMasterApi@destroy");

// candidate interview result routes

$router->get("/candidate-interview-result","CandidateInterviewResultApi@index");

$router->get("/candidate-interview-result/{id}","CandidateInterviewResultApi@show");

$router->post("/candidate-interview-result","CandidateInterviewResultApi@store");

$router->put("/candidate-interview-result/{id}","CandidateInterviewResultApi@update");

$router->delete("/candidate-interview-result/{id}","CandidateInterviewResultApi@destroy");

// offer details routes

$router->get("/offer-details","offerDetailsApi@index");

$router->get("/offer-details/{id}","offerDetailsApi@show");

$router->post("/offer-details","offerDetailsApi@store");

$router->put("/offer-details/{id}","offerDetailsApi@update");

$router->delete("/offer-details/{id}","offerDetailsApi@destroy");

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

// employee attendance details master routes

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

// user login routes

$router->get("/user","UserDetailsApi@index");

$router->get("/user/{id}","UserDetailsApi@show");

$router->post("/user","UserDetailsApi@store");

$router->put("/user/{id}","UserDetailsApi@update");

$router->delete("/user/{id}","UserDetailsApi@destroy");


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
