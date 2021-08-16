<?php

namespace App\Http\Controllers;
use App\Models\Employee_allocation_salary_detail;
use Illuminate\Http\Request;
class EmplyeeAlocationSalaryDetailsApi extends Controller
{

    private $response;
    public function index(Request $request)
    {
       if($request["page"])
       {
           $this->response = Employee_allocation_salary_detail::paginate($request["limit"]);
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
           $this->response = Employee_allocation_salary_detail::get();
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

      $this->response = Employee_allocation_salary_detail::create($request->all());
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

      $this->response = Employee_allocation_salary_detail::where("id",$id)->get();
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
        $this->response = Employee_allocation_salary_detail::where("id",$id)->update(array(
          "salary_head_id"=>$request["salary_head_id"],
          "amount"=>$request["amount"],
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
        $this->response = Employee_allocation_salary_detail::where("id",$id)->delete();
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
