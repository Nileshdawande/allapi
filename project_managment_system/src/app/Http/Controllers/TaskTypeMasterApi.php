<?php

namespace App\Http\Controllers;
use App\Models\Task_type_master;
use Illuminate\Http\Request;
class TaskTypeMasterApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $response;
    public function index(Request $request)
    {
          $this->response = Task_type_master::get();

          if(count($this->response) != 0)
          {
             return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
             unset($request);
             unset($_GET);
             unset($this->response);
          }

          else
          {
             unset($request);
             unset($_GET);
             unset($this->response);
             return response(array("notice"=>"Data not found !"),404)->header("Content-Type","application/json");
          }
    }


    public function store(Request $request)
    {

        $this->response = Task_type_master::create($request->all());

        if($this->response)
        {
           return response(array("data"=>"Task type master created"),201)->header("Content-Type","application/json");
           unset($this->response);
           unset($_POST);
           unset($request);
        }

        else
        {
           unset($this->response);
           unset($_POST);
           unset($request);
           return response(array("notice"=>"Something went wrong !"),404)->header("Content-Type","application/json");
        }

    }

    public function show($id)
    {

          $this->response = Task_type_master::where("id",$id)->get();

          if(count($this->response) != 0)
          {
             return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
             unset($id);
             unset($this->response);
             unset($_GET);
          }

          else
          {
             unset($id);
             unset($this->response);
             unset($_GET);
             return response(array("notice"=>"Data not found !"),404)->header("Content-Type","application/json");
          }

    }


    public function update(Request $request, $id)
    {
        $this->response = Task_type_master::where("id",$id)->update(array(
            "type"=>$request["type"],
            "updated_by"=>$request["updated_by"]
        ));

        if($this->response)
        {
           unset($this->response);
           unset($request);
           unset($id);
           return response(array("data"=>"Update Success"),200)->header("Content-Type","application/json");
        }

        else
        {
           unset($this->response);
           unset($request);
           unset($id);
           return response(array("notice"=>"Update Failed"),404)->header("Content-Type","application/json");
        }
    }

    public function destroy($id)
    {
        $this->response = Task_type_master::where("id",$id)->delete();

        if($this->response)
        {
           unset($id);
           unset($this->response);
           return response(array("data"=>"Delete success"),200)->header("Content-Type","application/json");
        }

        else
        {
           unset($id);
           unset($this->response);
           return response(array("notice"=>"Something went wrong"),404)->header("Content-Type","application/json");
        }
    }




}
