<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\BranchOfficeMasterService;
class BranchOfficeMasterApi extends Controller
{

    private $response;
    private $BranchOfficeMasterService;
    private $page;
    private $limit;
    public function __construct(BranchOfficeMasterService $BranchOfficeMasterService)
    {
        $this->BranchOfficeMasterService = $BranchOfficeMasterService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->BranchOfficeMasterService->show_all_branchOfficeMaster($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->BranchOfficeMasterService->show_all_branchOfficeMaster($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->BranchOfficeMasterService->create_branchOfficeMaster($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->BranchOfficeMasterService->show_branchOfficeMaster($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->BranchOfficeMasterService->update_branchOfficeMaster($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->BranchOfficeMasterService->delete_branchOfficeMaster($id);
        return $data;
    }

}
