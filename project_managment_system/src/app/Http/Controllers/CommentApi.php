<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
class CommentApi extends Controller
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
          $this->response = Comment::get();

          if(count($this->response) != 0)
          {
             unset($_GET);
             unset($request);
             unset($this->response);
             return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
          }

          else
          {
             unset($_GET);
             unset($request);
             unset($this->response);
             return response(array("notice"=>"Data not found !"),404)->header("Content-Type","application/json");
          }
    }


    public function store(Request $request)
    {

        $this->response = Comment::create($request->all());

        if($this->response)
        {
           return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
           unset($request);
           unset($_POST);
           unset($this->response);
        }

        else
        {
           unset($request);
           unset($_POST);
           unset($this->response);
           return response(array("notice"=>"Something went wrong !"),404)->header("Content-Type","application/json");
        }

    }

    public function show($id, Request $request)
    {

        if($request['fetch_type'] == "taskid")
        {
            $this->response = Comment::where("task_id",$id)->get();

            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
               unset($request);
               unset($id);
               unset($this->response);
               unset($_GET);
            }

            else
            {
               unset($request);
               unset($id);
               unset($this->response);
               unset($_GET);
               return response(array("notice"=>"Data not found !"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Comment::where("id",$id)->get();

            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
               unset($request);
               unset($id);
               unset($this->response);
               unset($_GET);
            }

            else
            {
               unset($request);
               unset($id);
               unset($this->response);
               unset($_GET);
               return response(array("notice"=>"Data not found !"),404)->header("Content-Type","application/json");
            }
        }


    }


    public function update(Request $request, $id)
    {
         $this->response = Comment::where("id",$id)->update(array(
           "comments"=>$request["comments"],
           "updated_by"=>$request["updated_by"]
         ));

         if($this->response)
         {
            return response(array("data"=>"Update Success"),200)->header("Content-Type","application/json");
            unset($request);
            unset($id);
            unset($this->response);
         }

         else
         {
            unset($request);
            unset($id);
            unset($this->response);
            return response(array("notice"=>"Update Failed"),404)->header("Content-Type","application/json");
         }
    }

    public function destroy($id)
    {
        $this->response = Comment::where("id",$id)->delete();

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
