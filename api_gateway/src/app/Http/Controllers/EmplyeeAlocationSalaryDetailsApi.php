<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\EmployeeAllocationSalaryDetailService;
class EmplyeeAlocationSalaryDetailsApi extends Controller
{

    private $response;
    private $EmployeeAllocationSalaryDetailService;
    private $page;
    private $limit;
    public function __construct(EmployeeAllocationSalaryDetailService $EmployeeAllocationSalaryDetailService)
    {
        $this->EmployeeAllocationSalaryDetailService = $EmployeeAllocationSalaryDetailService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->EmployeeAllocationSalaryDetailService->show_all_employeeAllocationDetails($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->EmployeeAllocationSalaryDetailService->show_all_employeeAllocationDetails($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->EmployeeAllocationSalaryDetailService->create_employeeAllocationDetails($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->EmployeeAllocationSalaryDetailService->show_employeeAllocationDetails($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->EmployeeAllocationSalaryDetailService->update_employeeAllocationDetails($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->EmployeeAllocationSalaryDetailService->delete_employeeAllocationDetails($id);
        return $data;
    }

}
