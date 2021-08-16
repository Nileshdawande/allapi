<?php

namespace App\Http\Controllers;
use App\Models\Lead_rank;
use Illuminate\Http\Request;

class lead_status_api extends Controller
{

    private $response;
    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = \DB::table('lead_ranks')->paginate($request['limit']);
            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }

            else
            {
                return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Lead_rank::get();

            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }

            else
            {
                return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
            }
        }

    }


    public function store(Request $request)
    {
        $this->response = Lead_rank::where("status",$request['status'])->get();
        if(count($this->response) == 0)
        {
           $this->response = Lead_rank::create($request->all());

           if($this->response)
           {
               return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
           }

           else
           {
               return response(array("notice"=>"Something is wrong"),500)->header("Content-Type","application/json");
           }
        }

        else
        {
           return response(array("notice"=>"Duplicate Entry"),409)->header("Content-Type","application/json");
        }




    }

    public function show($lead_id,Request $request)
    {

        if($request['limit'])
        {
            $this->response = \DB::table('lead_ranks')->where("status","LIKE",$lead_id."%")->paginate($request['limit']);
            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }

            else
            {
                return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Lead_rank::where("id",$lead_id)->get();

            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }

            else
            {
                return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
            }
        }



    }


    public function update(Request $request, $lead_id)
    {
        $this->response = Lead_rank::where("id",$lead_id)->update(array(
            "status"=>$request['status']
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

    public function destroy($lead_id)
    {
        $this->response = Lead_rank::where("id",$lead_id)->delete();

        if($this->response)
        {
            return response(array("data"=>"Delete Success"),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("notice"=>"Not Delete"),404)->header("Content-Type","application/json");
        }
    }




}
