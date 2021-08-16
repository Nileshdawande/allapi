<?php

namespace App\Http\Controllers;
use App\Models\Attendance_details_master;
use Illuminate\Http\Request;
class AttendanceDetailsApi extends Controller
{

    private $response;
    public function index(Request $request)
    {
       if($request["page"])
       {
           $this->response = Attendance_details_master::paginate($request["limit"]);
           if(count($this->response) != 0)
           {
              return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
           }
           else
           {
              return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
           }
       }

       else
       {
           $this->response = Attendance_details_master::get();
           if(count($this->response) != 0)
           {
              return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
           }
           else
           {
              return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
           }
       }


    }


    public function store(Request $request)
    {
         $this->response = Attendance_details_master::create($request->all());

         if($this->response)
         {
            return response(array("notice"=>"Attendance details master created"),201)->header("Content-Type","application/json");
         }

         else
         {
           return response(array("notice"=>"Something went wrong try again"),404)->header("Content-Type","application/json");
         }
    }

    public function show($id)
    {
         $this->response = Attendance_details_master::where("id",$id)->get();
         if($this->response)
         {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
         }

         else
         {
           return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
         }
    }


    public function update(Request $request, $id)
    {
        $this->response = Attendance_details_master::where("id",$id)->update(array(
          "employee_id"=>$request["employee_id"],
          "office_id"=>$request["office_id"],
          "work_date"=>$request["work_date"],
          "working"=>$request["working"]
        ));

        if($this->response)
        {
           return response(array("notice"=>"Update Success"),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("notice"=>"Update Failed"),404)->header("Content-Type","application/json");
        }
    }

    public function destroy($id)
    {
        $this->response = Attendance_details_master::where("id",$id)->delete();

        if($this->response)
        {
           return response(array("notice"=>"Delete Success"),200)->header("Content-Type","application/json");
        }

        else
        {
          return response(array("notice"=>"Delete Failed"),404)->header("Content-Type","application/json");
        }
    }

}
