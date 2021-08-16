<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\EmployeeMasterService;
class EmployeeMasterApi extends Controller
{

    private $response;
    private $EmployeeMasterService;
    private $page;
    private $limit;
    public function __construct(EmployeeMasterService $EmployeeMasterService)
    {
        $this->EmployeeMasterService = $EmployeeMasterService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->EmployeeMasterService->show_all_employeeMaster($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->EmployeeMasterService->show_all_employeeMaster($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->EmployeeMasterService->create_employeeMaster($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->EmployeeMasterService->show_employeeMaster($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->EmployeeMasterService->update_employeeMaster($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->EmployeeMasterService->delete_employeeMaster($id);
        return $data;
    }

}
