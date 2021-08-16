<?php

namespace App\Http\Controllers;
use App\Models\Branch_office_master;
use Illuminate\Http\Request;
class BranchOfficeMasterApi extends Controller
{

    private $response;
    public function index(Request $request)
    {
       if($request["page"])
       {
           $this->response = Branch_office_master::paginate($request["limit"]);
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
           $this->response = Branch_office_master::get();
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

      $this->response = Branch_office_master::create($request->all());
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

      $this->response = Branch_office_master::where("id",$id)->get();
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
        $this->response = Branch_office_master::where("id",$id)->update(array(
          "branch_id"=>$request["branch_id"],
          "office_id"=>$request["office_id"],
          "status"=>$request["status"],
          "date_of_activation"=>$request["date_of_activation"],
          "date_of_deactivation"=>$request["date_of_deactivation"]
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
        $this->response = Branch_office_master::where("id",$id)->delete();
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
