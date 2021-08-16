<?php

namespace App\Http\Controllers;
use App\Models\Employee_salarie;
use Illuminate\Http\Request;
class EmployeeSalaryApi extends Controller
{

    private $response;
    public function index(Request $request)
    {
       if($request["page"])
       {
           $this->response = Employee_salarie::paginate($request["limit"]);
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
           $this->response = Employee_salarie::get();
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
         $this->response = Employee_salarie::create($request->all());

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
         $this->response = Employee_salarie::where("id",$id)->get();
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
        $this->response = Employee_salarie::where("id",$id)->update(array(
          "employee_id"=>$request["employee_id"],
          "month_of_year"=>$request["month_of_year"],
          "date_of_salary_processing"=>$request["date_of_salary_processing"],
          "no_of_expected_wroking_days"=>$request["no_of_expected_wroking_days"],
          "no_of_days_worked"=>$request["no_of_days_worked"],
          "salary_deduction_amount"=>$request["salary_deduction_amount"],
          "salary_deduction_type"=>$request["salary_deduction_type"],
          "net_amount"=>$request["net_amount"],
          "salary_transferred"=>$request["salary_transferred"]
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
        $this->response = Employee_salarie::where("id",$id)->delete();

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
