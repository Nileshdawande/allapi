<?php

namespace App\Http\Controllers;
use App\Models\Employee_leave;
use Illuminate\Http\Request;
class EmployeeLeavesApi extends Controller
{

    private $response;
    public function index(Request $request)
    {
       if($request["page"])
       {
           $this->response = Employee_leave::paginate($request["limit"]);
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
           $this->response = Employee_leave::get();
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
         $this->response = Employee_leave::create($request->all());

         if($this->response)
         {
            return response(array("notice"=>"Employee leave master created"),201)->header("Content-Type","application/json");
         }

         else
         {
           return response(array("notice"=>"Something went wrong try again"),404)->header("Content-Type","application/json");
         }
    }

    public function show($id)
    {
         $this->response = Employee_leave::where("id",$id)->get();
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
        $this->response = Employee_leave::where("id",$id)->update(array(
          "employee_id"=>$request["employee_id"],
          "date_of_leave"=>$request["date_of_leave"],
          "leave_type_id"=>$request["leave_type_id"],
          "leave"=>$request["leave"]
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
        $this->response = Employee_leave::where("id",$id)->delete();

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
