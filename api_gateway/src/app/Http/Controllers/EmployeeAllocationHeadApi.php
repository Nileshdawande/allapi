<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\EmployeeAllocationService;
class EmployeeAllocationHeadApi extends Controller
{

    private $response;
    private $EmployeeAllocationService;
    private $page;
    private $limit;
    public function __construct(EmployeeAllocationService $EmployeeAllocationService)
    {
        $this->EmployeeAllocationService = $EmployeeAllocationService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->EmployeeAllocationService->show_all_employeeAllocation($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->EmployeeAllocationService->show_all_employeeAllocation($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->EmployeeAllocationService->create_employeeAllocation($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->EmployeeAllocationService->show_employeeAllocation($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->EmployeeAllocationService->update_employeeAllocation($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->EmployeeAllocationService->delete_employeeAllocation($id);
        return $data;
    }

}
