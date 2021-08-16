<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\CmpAnnualLeavesService;
class CmpAnnualLeaveMasterApi extends Controller
{

    private $response;
    private $CmpAnnualLeavesService;
    private $page;
    private $limit;
    public function __construct(CmpAnnualLeavesService $CmpAnnualLeavesService)
    {
        $this->CmpAnnualLeavesService = $CmpAnnualLeavesService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->CmpAnnualLeavesService->show_all_cmpAnnualMaster($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->CmpAnnualLeavesService->show_all_cmpAnnualMaster($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->CmpAnnualLeavesService->create_cmpAnnualMaster($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->CmpAnnualLeavesService->show_cmpAnnualMaster($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->CmpAnnualLeavesService->update_cmpAnnualMaster($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->CmpAnnualLeavesService->delete_cmpAnnualMaster($id);
        return $data;
    }

}
