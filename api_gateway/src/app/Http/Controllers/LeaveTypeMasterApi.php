<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\LeaveTypeService;
class LeaveTypeMasterApi extends Controller
{

    private $response;
    private $LeaveTypeService;
    private $page;
    private $limit;
    public function __construct(LeaveTypeService $LeaveTypeService)
    {
        $this->LeaveTypeService = $LeaveTypeService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->LeaveTypeService->show_all_leaveType($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->LeaveTypeService->show_all_leaveType($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->LeaveTypeService->create_leaveType($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->LeaveTypeService->show_leaveType($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->LeaveTypeService->update_leaveType($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->LeaveTypeService->delete_leaveType($id);
        return $data;
    }

}
