<?php

namespace App\Http\Controllers;
use App\Models\Parameter_master;
use Illuminate\Http\Request;
class ParameterMasterApi extends Controller
{

    private $response;
    private $page;
    private $limit;
    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = Parameter_master::paginate($request['limit']);
            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }

            else
            {
              return response(array("notice"=>"Not found"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Parameter_master::get();
            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
              return response(array("notice"=>"Not found"),404)->header("Content-Type","application/json");
            }
        }

    }

    public function store(Request $request)
    {

      $this->response = Parameter_master::create($request->all());
      if($this->response)
      {
         return response(array("notice"=>"Parameter created"),201)->header("Content-Type","application/json");
      }

      else
      {
        return response(array("notice"=>"Something went wrong try again"),404)->header("Content-Type","application/json");
      }

    }

    public function show($id)
    {

      $this->response = Parameter_master::where("id",$id)->get();
      if(count($this->response) != 0)
      {
         return response(array("notice"=>$this->response),200)->header("Content-Type","application/json");
      }

      else
      {
         return response(array("notice"=>"Not found"),404)->header("Content-Type","application/json");
      }

    }


    public function update(Request $request, $id)
    {
        $this->response =  Parameter_master::where("id",$id)->update(array(
            "parameter_name"=>$request['parameter_name']
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

        $this->response = Parameter_master::where("id",$id)->delete();
        if($this->response)
        {
           return response(array("notice"=>"Delete Success"),200)->header("Content-Type","application/json");
        }

        else
        {
          return response(array("notice"=>"Delete failed"),404)->header("Content-Type","application/json");
        }
    }




}
