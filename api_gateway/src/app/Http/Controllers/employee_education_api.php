<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\empeducation_service;
class employee_education_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $empeducation_service;
    public function __construct(empeducation_service $empeducation_service)
    {
        $this->empeducation_service = $empeducation_service;
    }

    public function index(Request $request)
    {
        $data = $this->empeducation_service->show_all_employee();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->empeducation_service->create_employee($request->all());   
        return $data;
    }

    public function show($edu_id)
    {
        $data = $this->empeducation_service->show_employee($edu_id);
        return $data;
    }


    public function update(Request $request, $edu_id)
    {
        $data = $this->empeducation_service->update_employee($edu_id,$request->all());
        return $data;        
    }

    public function destroy($edu_id)
    {
        $data = $this->empeducation_service->delete_employee($edu_id);
        return $data;        
    }

}
