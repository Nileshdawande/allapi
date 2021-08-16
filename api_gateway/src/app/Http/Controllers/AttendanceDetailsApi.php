<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\AttendanceMasterService;
class AttendanceDetailsApi extends Controller
{

    private $response;
    private $AttendanceMasterService;
    private $page;
    private $limit;
    public function __construct(AttendanceMasterService $AttendanceMasterService)
    {
        $this->AttendanceMasterService = $AttendanceMasterService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->AttendanceMasterService->show_all_AttendanceMaster($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->AttendanceMasterService->show_all_AttendanceMaster($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->AttendanceMasterService->create_AttendanceMaster($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->AttendanceMasterService->show_AttendanceMaster($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->AttendanceMasterService->update_AttendanceMaster($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->AttendanceMasterService->delete_AttendanceMaster($id);
        return $data;
    }

}
