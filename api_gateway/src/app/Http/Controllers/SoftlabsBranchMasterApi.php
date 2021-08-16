<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\branchMasterService;
class SoftlabsBranchMasterApi extends Controller
{

    private $response;
    private $branchMasterService;
    private $page;
    private $limit;
    public function __construct(branchMasterService $branchMasterService)
    {
        $this->branchMasterService = $branchMasterService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->branchMasterService->show_all_branchMaster($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->branchMasterService->show_all_branchMaster($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->branchMasterService->create_branchMaster($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->branchMasterService->show_branchMaster($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->branchMasterService->update_branchMaster($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->branchMasterService->delete_branchMaster($id);
        return $data;
    }

}
