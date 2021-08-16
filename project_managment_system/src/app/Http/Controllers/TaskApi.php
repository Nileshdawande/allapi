<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
class TaskApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $response;
    private $formdata;
    public function index(Request $request)
    {
          $this->response = Task::get();

          if(count($this->response) != 0)
          {
             return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
             unset($_GET);
             unset($this->response);
             unset($request);

          }

          else
          {
             unset($_GET);
             unset($this->response);
             unset($request);
             return response(array("notice"=>"Data not found !"),404)->header("Content-Type","application/json");
          }
    }


    public function store(Request $request)
    {

        $this->formdata = $request->all();
        if($this->formdata['start_date'] == "")
        {
           $this->formdata['start_date'] = Null;
        }

        if($this->formdata['end_date'] == "")
        {
           $this->formdata['end_date'] = Null;
        }


        $this->response = Task::create($this->formdata);

        if($this->response)
        {
           return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
           unset($this->response);
           unset($this->formdata);
           unset($request);
           unset($_POST);
        }

        else
        {
            return response(array("notice"=>"Something went wrong !"),404)->header("Content-Type","application/json");
            unset($this->response);
            unset($this->formdata);
            unset($request);
            unset($_POST);
        }

    }

    public function show($id, Request $request)
    {

          if($request['fetch_type'] == "project")
          {
              $this->response = Task::where("project_id",$id)->get();

              if(count($this->response) != 0)
              {
                 return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
                 unset($this->response);
                 unset($request);
                 unset($_GET);
                 unset($id);
              }

              else
              {
                 unset($this->response);
                 unset($request);
                 unset($_GET);
                 unset($id);
                 return response(array("notice"=>"Data not found !"),404)->header("Content-Type","application/json");
              }
          }

          else
          {
              $this->response = Task::where("id",$id)->get();

              if(count($this->response) != 0)
              {
                 return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
                 unset($this->response);
                 unset($request);
                 unset($_GET);
                 unset($id);
              }

              else
              {
                 unset($this->response);
                 unset($request);
                 unset($_GET);
                 unset($id);
                 return response(array("notice"=>"Data not found !"),404)->header("Content-Type","application/json");
              }
          }



    }


    public function update(Request $request, $id)
    {
         $this->response = Task::where("id",$id)->update(array(
           "parent_task_id"=>$request['parent_task_id'],
           "project_id"=>$request['project_id'],
           "type_id"=>$request['type_id'],
           "status_id"=>$request['status_id'],
           "summary"=>$request['summary'],
           "description"=>$request['description'],
           "assignee"=>$request['assignee'],
           "start_date"=>$request['start_date'],
           "end_date"=>$request['end_date'],
           "priority"=>$request['priority'],
           "created_by"=>$request['created_by'],
           "updated_by"=>$request["updated_by"]
         ));

         if($this->response)
         {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            unset($this->response);
            unset($request);
            unset($id);
         }

         else
         {
            unset($this->response);
            unset($request);
            unset($id);
            return response(array("notice"=>"Update failed"),404)->header("Content-Type","application/json");
         }
    }

    public function destroy($id)
    {
        $this->response = Task::where("id",$id)->delete();

        if($this->response)
        {
           unset($this->response);
           unset($id);
           return response(array("data"=>"Delete success"),200)->header("Content-Type","application/json");
        }

        else
        {
           unset($this->response);
           unset($id);
           return response(array("notice"=>"Something went wrong"),404)->header("Content-Type","application/json");
        }
    }




}
