<?php

namespace App\Http\Controllers;
use App\Models\Designation_master;
use Illuminate\Http\Request;
class designationApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $limit;
    private $find_data;
    private $all_data;
    public function index(Request $request)
    {

       $this->response = Designation_master::get();
       if(count($this->response) != 0)
       {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
       }

       else
       {
            return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
       }

    }


    public function store(Request $request)
    {
       $this->response = Designation_master::where("designation_name",$request['designation_name'])->get();
       if (count($this->response) == 0)
       {
          Designation_master::create($request->all());
          return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
       }

       else
       {
          return response(array("notice"=>"Duplicate Entry"),409)->header("Content-Type","application/json");
       }

    }


    public function show($designation_id,Request $request)
    {

         $this->response = Designation_master::where("id",$designation_id)->get();
         if(count($this->response) != 0)
         {
              return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
         }

         else
         {
              return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
         }

    }



    public function update(Request $request, $designation_id)
    {
        $this->response = Designation_master::where("id",$designation_id)->update(array(
            "designation_name"=>$request["designation_name"],
            "status"=>$request["status"]
        ));

        if($this->response)
        {
            return response(array("data"=>"Update Success"),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Update Failed"),404)->header("Content-Type","application/json");
        }
    }

    public function destroy($designation_id)
    {
        $this->response = Designation_master::where("id",$designation_id)->delete();

        if($this->response)
        {
            return response(array("data"=>"Delete Success"),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Delete Failed"),200)->header("Content-Type","application/json");
        }

    }




}
