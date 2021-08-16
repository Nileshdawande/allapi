<?php

namespace App\Http\Controllers;
use App\Models\Interaction;
use Illuminate\Http\Request;
class interaction_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    public function index(Request $request)
    {
        if($request['page'])
        {
           $this->response = \DB::table("interactions")->paginate($request['limit']);
           if(count($this->response) != 0)
           {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
           }
           else
           {
               return response(array("notice"=>"Data Not Found"),404)->header("Content-Type","application/json");
           }
        }

        else
        {
            $this->response = Interaction::get();
            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
                return response(array("notice"=>"Data Not Found"),404)->header("Content-Type","application/json");
            }
        }

    }


    public function store(Request $request)
    {
        $this->response = Interaction::where("interaction_name",$request['interaction_name'])->get();
        if(count($this->response) == 0)
        {
           $this->response = Interaction::create($request->all());
           return response(array("data"=>"Interaction created"),201)->header("Content-Type","application/json");
        }

        else
        {
           return response(array("notice"=>"Duplicate entry"),409)->header("Content-Type","application/json");
        }


    }

    public function show($interaction_id,Request $request)
    {
        if($request['limit'])
        {
            $this->response = \DB::table("interactions")->where("interaction_name","LIKE",$interaction_id."%")->paginate($request['limit']);
            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
                return response(array("notice"=>"Data Not Found"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Interaction::where("id",$interaction_id)->get();
            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
                return response(array("notice"=>"Data Not Found"),404)->header("Content-Type","application/json");
            }
        }



    }


    public function update(Request $request, $interaction_id)
    {

        $this->response = Interaction::where("id",$interaction_id)->update(array(
            "interaction_name"=>$request['interaction_name']
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

    public function destroy($interaction_id)
    {
        $this->response = Interaction::where("id",$interaction_id)->delete();

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
