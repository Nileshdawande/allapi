<?php

namespace App\Http\Controllers;
use App\Models\Softlabs_office_master;
use Illuminate\Http\Request;
class SoftlabsOfficeMasterApi extends Controller
{

    private $response;
    public function index(Request $request)
    {
       if($request["page"])
       {
           $this->response = Softlabs_office_master::paginate($request["limit"]);
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
           $this->response = Softlabs_office_master::get();
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

      $this->response = Softlabs_office_master::create($request->all());
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

      $this->response = Softlabs_office_master::where("id",$id)->get();
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
        $this->response = Softlabs_office_master::where("id",$id)->update(array(
          "office_code"=>$request["office_code"],
          "office_name"=>$request["office_name"],
          "office_address_one"=>$request["office_address_one"],
          "office_address_two"=>$request["office_address_two"],
          "office_address_three"=>$request["office_address_three"],
          "office_city"=>$request["office_city"],
          "office_state"=>$request["office_state"],
          "office_country"=>$request["office_country"],
          "office_pincode"=>$request["office_pincode"],
          "office_start_date"=>$request["office_start_date"],
          "office_area"=>$request["office_area"],
          "office_contact_one"=>$request["office_contact_one"],
          "office_contact_two"=>$request["office_contact_two"],
          "office_contact_person"=>$request["office_contact_person"],
          "office_con_per_phoneno"=>$request["office_con_per_phoneno"],
          "office_status"=>$request["office_status"],
          "office_end_date"=>$request["office_end_date"]
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
        $this->response = Softlabs_office_master::where("id",$id)->delete();
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
