<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\empsalary_service;
class employee_salary_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $empsalary_service;
    public function __construct(empsalary_service $empsalary_service)
    {
        $this->empsalary_service = $empsalary_service;
    }

    public function index(Request $request)
    {
        $data = $this->empsalary_service->show_all_employee_sal();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->empsalary_service->create_employee_sal($request->all());   
        return $data;
    }

    public function show($sal_id)
    {
        $data = $this->empsalary_service->show_employee_sal($sal_id);
        return $data;
    }


    public function update(Request $request, $sal_id)
    {
        $data = $this->empsalary_service->update_employee_sal($sal_id,$request->all());
        return $data;        
    }

    public function destroy($sal_id)
    {
        $data = $this->empsalary_service->delete_employee_sal($sal_id);
        return $data;        
    }

}
