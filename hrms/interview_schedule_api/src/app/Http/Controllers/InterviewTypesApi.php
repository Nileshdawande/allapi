<?php

namespace App\Http\Controllers;
use App\Models\Interview_type;
use Illuminate\Http\Request;
class InterviewTypesApi extends Controller
{

    private $response;

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = Interview_type::paginate($request['limit']);

            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
               return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Interview_type::get();

            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
               return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
            }
        }

    }


    public function store(Request $request)
    {
        $this->response = Interview_type::create($request->all());

        if($this->response)
        {
           return response(array("data"=>"Interview types created"),201)->header("Content-Type","application/json");
        }
        else
        {
           return response(array("notice"=>"Something went wrong try again"),404)->header("Content-Type","application/json");
        }
    }

    public function show($id,Request $request)
    {
        if($request['limit'])
        {
            $this->response = Interview_type::where("interview_type_name","LIKE",$id."%")->paginate($request['limit']);

            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
            }
            else
            {
               return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Interview_type::where("id",$id)->get();

            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
            }
            else
            {
               return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
            }
        }

    }


    public function update(Request $request, $id)
    {

         $this->response =  Interview_type::where("id",$id)->update(array(
            "interview_type_name"=>$request['interview_type_name'],
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
        $this->response = Interview_type::where("id",$id)->delete();

        if($this->response)
        {
           return response(array("notice"=>"Delete success"),200)->header("Content-Type","application/json");
        }
        else
        {
           return response(array("notice"=>"Not deleted"),404)->header("Content-Type","application/json");
        }
    }


}
