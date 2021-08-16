<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\officeMasterService;
class SoftlabsOfficeMasterApi extends Controller
{

    private $response;
    private $officeMasterService;
    private $page;
    private $limit;
    public function __construct(officeMasterService $officeMasterService)
    {
        $this->officeMasterService = $officeMasterService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->officeMasterService->show_all_officeMaster($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->officeMasterService->show_all_officeMaster($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->officeMasterService->create_officeMaster($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->officeMasterService->show_officeMaster($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->officeMasterService->update_officeMaster($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->officeMasterService->delete_officeMaster($id);
        return $data;
    }

}
