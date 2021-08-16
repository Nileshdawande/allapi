<?php

namespace App\Http\Controllers;
use App\Models\Lead;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
session_start();
use Illuminate\Support\Facades\Http;
class lead_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $from_date;
    private $to_date;
    private $res_data;
    private $contact_id;
    private $contact_res;
    private $limit;
    public function index(Request $request)
    {
        if($request['fetch_type'] == "report")
        {
           $this->response = Lead::orderBy("id","DESC")->where("interaction_id",null)->get();
           if(count($this->response) != 0)
           {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
           }
           else
           {
              return response(array("data"=>"Not found"),404)->header("Content-Type","application/json");
           }
        }

        else
        {
            $this->response = Lead::get();
            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
                return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
            }
        }

    }


    private $result;
    private $obj;
    public function store(Request $request)
    {

        $this->response = Lead::create($request->all());
        $this->response = Lead::orderBy("id","DESC")->limit(1)->get();

        foreach($this->response as $this->res_data)
        {
            $_SESSION['l_id'] = $this->res_data->id;
        }

        return response(array("data"=>$this->response),201)->header("Content-Type","application/json");


    }

    public function show($lead_id)
    {

        $this->response = Lead::where("id",$lead_id)->get();
        if(count($this->response) != 0)
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }
        else
        {
            return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
        }

    }


    public function update(Request $request, $lead_id)
    {
        if($request['fetch_type'] == "lead_contact_id")
        {
            $this->response = Lead::where("id",$lead_id)->update(array(
                "contact_id"=>$request['contact_id']
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

        if($request['fetch_type'] == "lead_company_id")
        {
            $this->response = Lead::where("id",$lead_id)->update(array(
                "company_id"=>$request['company_id']
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

        if($request['fetch_type'] == "interaction_id")
        {
           Lead::where("id",$lead_id)->update(array(
             "interaction_id"=>$request['interaction_id']
           ));

           return response(array("data"=>"Update Success"),200)->header("Content-Type","application/json");
        }

    }

    public function destroy($lead_id)
    {
        $this->response = Lead::where("id",$lead_id)->delete();

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
