<?php

namespace App\Http\Controllers;
use App\Models\Softlabs_branch_master;
use Illuminate\Http\Request;
class SoftlabsBranchMasterApi extends Controller
{

    private $response;
    public function index(Request $request)
    {
       if($request["page"])
       {
           $this->response = Softlabs_branch_master::paginate($request["limit"]);
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
           $this->response = Softlabs_branch_master::get();
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

      $this->response = Softlabs_branch_master::create($request->all());
      if($this->response)
      {
         return response(array("notice"=>"branch master created"),201)->header("Content-Type","application/json");
      }

      else
      {
         return response(array("notice"=>"Something went wrong try again"),200)->header("Content-Type","application/json");
      }

    }

    public function show($id)
    {

      $this->response = Softlabs_branch_master::where("id",$id)->get();
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
        $this->response = Softlabs_branch_master::where("id",$id)->update(array(
          "branch_code"=>$request["branch_code"],
          "branch_name"=>$request["branch_name"],
          "address_one"=>$request["address_one"],
          "address_two"=>$request["address_two"],
          "address_three"=>$request["address_three"],
          "branch_pincode"=>$request["branch_pincode"],
          "branch_city"=>$request["branch_city"],
          "branch_state"=>$request["branch_state"],
          "branch_country"=>$request["branch_country"],
          "branch_start_date"=>$request["branch_start_date"],
          "date_of_decommissioning"=>$request["date_of_decommissioning"],
          "branch_status"=>$request["branch_status"],
          "branch_head_office"=>$request["branch_head_office"]
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
        $this->response = Softlabs_branch_master::where("id",$id)->delete();
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
