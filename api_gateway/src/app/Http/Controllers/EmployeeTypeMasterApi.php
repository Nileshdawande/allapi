<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\EmployeeTypeMasterService;
class EmployeeTypeMasterApi extends Controller
{

    private $response;
    private $EmployeeTypeMasterService;
    private $page;
    private $limit;
    public function __construct(EmployeeTypeMasterService $EmployeeTypeMasterService)
    {
        $this->EmployeeTypeMasterService = $EmployeeTypeMasterService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->EmployeeTypeMasterService->show_all_employeeTypeMaster($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->EmployeeTypeMasterService->show_all_employeeTypeMaster($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->EmployeeTypeMasterService->create_employeeTypeMaster($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->EmployeeTypeMasterService->show_employeeTypeMaster($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->EmployeeTypeMasterService->update_employeeTypeMaster($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->EmployeeTypeMasterService->delete_employeeTypeMaster($id);
        return $data;
    }

}
