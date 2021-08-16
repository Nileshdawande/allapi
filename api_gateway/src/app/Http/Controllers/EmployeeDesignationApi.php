<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\EmployeeDesignationService;
class EmployeeDesignationApi extends Controller
{

    private $response;
    private $EmployeeDesignationService;
    private $page;
    private $limit;
    public function __construct(EmployeeDesignationService $EmployeeDesignationService)
    {
        $this->EmployeeDesignationService = $EmployeeDesignationService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->EmployeeDesignationService->show_all_employeeDesignation($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->EmployeeDesignationService->show_all_employeeDesignation($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->EmployeeDesignationService->create_employeeDesignation($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->EmployeeDesignationService->show_employeeDesignation($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->EmployeeDesignationService->update_employeeDesignation($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->EmployeeDesignationService->delete_employeeDesignation($id);
        return $data;
    }

}
