<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\EmpAnnualMasterService;
class EmpAnnualLeaveMasterApi extends Controller
{

    private $response;
    private $EmpAnnualMasterService;
    private $page;
    private $limit;
    public function __construct(EmpAnnualMasterService $EmpAnnualMasterService)
    {
        $this->EmpAnnualMasterService = $EmpAnnualMasterService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->EmpAnnualMasterService->show_all_empAnnualMaster($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->EmpAnnualMasterService->show_all_empAnnualMaster($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->EmpAnnualMasterService->create_empAnnualMaster($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->EmpAnnualMasterService->show_empAnnualMaster($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->EmpAnnualMasterService->update_empAnnualMaster($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->EmpAnnualMasterService->delete_empAnnualMaster($id);
        return $data;
    }

}
