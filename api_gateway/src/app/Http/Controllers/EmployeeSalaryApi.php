<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\EmployeeSalaryService;
class EmployeeSalaryApi extends Controller
{

    private $response;
    private $EmployeeSalaryService;
    private $page;
    private $limit;
    public function __construct(EmployeeSalaryService $EmployeeSalaryService)
    {
        $this->EmployeeSalaryService = $EmployeeSalaryService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->EmployeeSalaryService->show_all_EmployeeSalary($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->EmployeeSalaryService->show_all_EmployeeSalary($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->EmployeeSalaryService->create_EmployeeSalary($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->EmployeeSalaryService->show_EmployeeSalary($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->EmployeeSalaryService->update_EmployeeSalary($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->EmployeeSalaryService->delete_EmployeeSalary($id);
        return $data;
    }

}
