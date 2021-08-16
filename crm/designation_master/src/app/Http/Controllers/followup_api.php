<?php

namespace App\Http\Controllers;
use App\Models\Followup;
use Illuminate\Http\Request;
class followup_api extends Controller
{

    private $response;
    private $from_date;
    private $to_date;
    private $last_id;
    private $limit;
    public function index(Request $request)
    {
        if($request['fetch_type'] == "report")
        {
          $this->response = Followup::orderBy("id","DESC")->where("followup_id",null)->get();

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
          $this->response = Followup::get();

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

        if($request['store_type'])
        {
            $this->response = Followup::create($request->all());

            if($this->response)
            {
                return response(array("data"=>$this->response->id),201)->header("Content-Type","application/json");
            }

            else
            {
                return response(array("notice"=>"Something is wrong"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Followup::create($request->all());

            if($this->response)
            {
                return response(array("data"=>$this->response->id),201)->header("Content-Type","application/json");
            }

            else
            {
                return response(array("notice"=>"Something is wrong"),404)->header("Content-Type","application/json");
            }
        }

    }

    public function show($followup_id)
    {
        $this->response = Followup::where("id",$followup_id)->get();

        if(count($this->response) != 0)
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("notice"=>"Data Not Found"),404)->header("Content-Type","application/json");
        }

    }


    public function update(Request $request, $followup_id)
    {
          if($request['update_type'] == "followup")
          {

             $this->response = Followup::where("id",$followup_id)->update(array(
               "followup_id"=>$request['followup_id']
             ));

             if($this->response)
             {
                return response(array("data"=>"Update Success"),200)->header("Content-Type","application/json");
             }

             else
             {
                return response(array("data"=>"Update failed"),404)->header("Content-Type","application/json");
             }

          }
    }

    public function destroy($followup_id)
    {

        $this->response = Followup::where("id",$followup_id)->delete();

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
