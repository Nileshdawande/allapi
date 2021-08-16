<?php

namespace App\Http\Controllers;
use App\Models\Task_status_master;
use Illuminate\Http\Request;
class TaskStatusMasterApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $response;
    public function index(Request $request)
    {
          $this->response = Task_status_master::get();

          if(count($this->response) != 0)
          {
             return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
             unset($this->response);
             unset($request);
             unset($_GET);
          }

          else
          {
             unset($this->response);
             unset($request);
             unset($_GET);
             return response(array("notice"=>"Data not found !"),404)->header("Content-Type","application/json");
          }
    }


    public function store(Request $request)
    {

        $this->response = Task_status_master::create($request->all());

        if($this->response)
        {
           return response(array("data"=>"Task status master created"),201)->header("Content-Type","application/json");
           unset($request);
           unset($this->response);
           unset($_POST);
        }

        else
        {
           unset($request);
           unset($this->response);
           unset($_POST);
           return response(array("notice"=>"Something went wrong !"),404)->header("Content-Type","application/json");
        }

    }

    public function show($id)
    {

          $this->response = Task_status_master::where("id",$id)->get();

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
        $this->response = Task_status_master::where("id",$id)->update(array(
          "status"=>$request['status'],
          "updated_by"=>$request['updated_by']
        ));

        if($this->response)
        {
           return response(array("data"=>"Update Success"),200)->header("Content-Type","application/json");
        }

        else
        {
           return response(array("notice"=>"Update Failed"),404)->header("Content-Type","application/json");
        }
    }

    public function destroy($id)
    {
        $this->response = Task_status_master::where("id",$id)->delete();

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
