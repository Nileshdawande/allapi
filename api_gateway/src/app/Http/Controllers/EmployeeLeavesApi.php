<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\EmployeeLeaveService;
class EmployeeLeavesApi extends Controller
{

    private $response;
    private $EmployeeLeaveService;
    private $page;
    private $limit;
    public function __construct(EmployeeLeaveService $EmployeeLeaveService)
    {
        $this->EmployeeLeaveService = $EmployeeLeaveService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->EmployeeLeaveService->show_all_EmployeeLeaveMaster($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->EmployeeLeaveService->show_all_EmployeeLeaveMaster($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->EmployeeLeaveService->create_EmployeeLeaveMaster($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->EmployeeLeaveService->show_EmployeeLeaveMaster($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->EmployeeLeaveService->update_EmployeeLeaveMaster($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->EmployeeLeaveService->delete_EmployeeLeaveMaster($id);
        return $data;
    }

}
