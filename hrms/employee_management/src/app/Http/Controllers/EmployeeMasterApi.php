<?php

namespace App\Http\Controllers;
use App\Models\Employee_master;
use Illuminate\Http\Request;
class EmployeeMasterApi extends Controller
{

    private $response;
    public function index(Request $request)
    {
       if($request["page"])
       {
           $this->response = Employee_master::paginate($request["limit"]);
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
           $this->response = Employee_master::get();
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

      $this->response = Employee_master::create($request->all());
      if($this->response)
      {
         return response(array("notice"=>"Employee master created"),201)->header("Content-Type","application/json");
      }

      else
      {
         return response(array("notice"=>"Something went wrong try again"),200)->header("Content-Type","application/json");
      }

    }

    public function show($id)
    {

      $this->response = Employee_master::where("id",$id)->get();
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
        if($request['candidate'])
        {
            $this->response = Employee_master::where("candidate_id",$id)->update(array(
              "user_id"=>$request["user_id"],
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

        else
        {
          $this->response = Employee_master::where("id",$id)->update(array(
            "employee_code"=>$request["employee_code"],
            "candidate_id"=>$request["candidate_id"],
            "employee_firstname"=>$request["employee_firstname"],
            "employee_middlename"=>$request["employee_middlename"],
            "employee_lastname"=>$request["employee_lastname"],
            "address_one"=>$request["address_one"],
            "address_two"=>$request["address_two"],
            "address_three"=>$request["address_three"],
            "city"=>$request["city"],
            "state"=>$request["state"],
            "country"=>$request["country"],
            "pincode"=>$request["pincode"],
            "dob"=>$request["dob"],
            "qual_one"=>$request["qual_one"],
            "qual_one_details"=>$request["qual_one_details"],
            "qual_two"=>$request["qual_two"],
            "qual_two_details"=>$request["qual_two_details"],
            "contact_one"=>$request["contact_one"],
            "contact_two"=>$request["contact_two"],
            "department_id"=>$request["department_id"],
            "employee_type_id"=>$request["employee_type_id"],
            "date_of_leaving"=>$request["date_of_leaving"],
            "status"=>$request["status"],
            "offer_id"=>$request["offer_id"]
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

    }

    public function destroy($id)
    {
        $this->response = Employee_master::where("id",$id)->delete();
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
