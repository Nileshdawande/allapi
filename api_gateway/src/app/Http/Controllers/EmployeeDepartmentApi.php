<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\EmployeeDepartmentService;
class EmployeeDepartmentApi extends Controller
{

    private $response;
    private $EmployeeDepartmentService;
    private $page;
    private $limit;
    public function __construct(EmployeeDepartmentService $EmployeeDepartmentService)
    {
        $this->EmployeeDepartmentService = $EmployeeDepartmentService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->EmployeeDepartmentService->show_all_employeeDepartment($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->EmployeeDepartmentService->show_all_employeeDepartment($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->EmployeeDepartmentService->create_employeeDepartment($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->EmployeeDepartmentService->show_employeeDepartment($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->EmployeeDepartmentService->update_employeeDepartment($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->EmployeeDepartmentService->delete_employeeDepartment($id);
        return $data;
    }

}
