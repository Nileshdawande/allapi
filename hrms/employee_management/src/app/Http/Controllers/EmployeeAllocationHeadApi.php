<?php

namespace App\Http\Controllers;
use App\Models\Employee_allocation_head;
use Illuminate\Http\Request;
class EmployeeAllocationHeadApi extends Controller
{

    private $response;
    public function index(Request $request)
    {
       if($request["page"])
       {
           $this->response = Employee_allocation_head::paginate($request["limit"]);
           if(count($this->response) !=0)
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
           $this->response = Employee_allocation_head::get();
           if(count($this->response) !=0)
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
      $this->response = Employee_allocation_head::where("employee_id",$request['employee_id'])->get();
      if(count($this->response) == 0)
      {
        $this->response = Employee_allocation_head::create($request->all());
        if($this->response)
        {
           return response(array("notice"=>"Employee master created"),201)->header("Content-Type","application/json");
        }

        else
        {
           return response(array("notice"=>"Something went wrong try again"),404)->header("Content-Type","application/json");
        }
      }

      else
      {
         return response(array("notice"=>"Duplicate Entry"),409)->header("Content-Type","application/json");
      }


    }

    public function show($id)
    {

      $this->response = Employee_allocation_head::where("id",$id)->get();
      if(count($this->response) !=0)
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
        $this->response = Employee_allocation_head::where("id",$id)->update(array(
          "employee_id"=>$request["employee_id"],
          "date_of_allocation"=>$request["date_of_allocation"],
          "designation_id"=>$request["designation_id"],
          "department_id"=>$request["department_id"],
          "branch_id"=>$request["branch_id"],
          "gross_salary"=>$request["gross_salary"],
          "deduction"=>$request["deduction"],
          "net_salary"=>$request["net_salary"],
          "allocation_type"=>$request["allocation_type"]
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
        $this->response = Employee_allocation_head::where("id",$id)->delete();
        if($this->response)
        {
           return response(array("data"=>"Delete Success"),200)->header("Content-Type","application/json");
        }

        else
        {
           return response(array("notice"=>"Delete Failed"),404)->header("Content-Type","application/json");
        }
    }




}
