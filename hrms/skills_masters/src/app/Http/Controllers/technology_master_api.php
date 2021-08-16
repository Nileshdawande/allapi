<?php

namespace App\Http\Controllers;
use App\Models\Technology_master;
use Illuminate\Http\Request;
class technology_master_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return votechnology_id
     */

    private $response;
    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = Technology_master::paginate($request['limit']);

            if (count($this->response) != 0)
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
            $this->response = Technology_master::get();

            if (count($this->response) != 0)
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

        $this->response = Technology_master::create($request->all());

        if ($this->response)
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Somethin is wrong try again"),404)->header("Content-Type","application/json");
        }

    }

    public function show($technology_id,Request $request)
    {

        if($request['limit'])
        {
            $this->response = Technology_master::where("technology_name","LIKE",$technology_id."%")->paginate($request['limit']);

            if (count($this->response) != 0)
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
            $this->response = Technology_master::where("id",$technology_id)->get();

            if (count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }

            else
            {
                return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
            }
        }


    }


    public function update(Request $request, $technology_id)
    {
         $this->response = Technology_master::where("id",$technology_id)->update(array(
           "technology_name"=>$request['technology_name']
         ));

         if ($this->response)
         {
            return response(array("notice"=>"Update Success"),200)->header("Content-Type","application/json");
         }

         else
         {
           return response(array("notice"=>"Update Failed"),404)->header("Content-Type","application/json");
         }
    }

    public function destroy($technology_id)
    {

        $this->response = Technology_master::where("id",$technology_id)->delete();

        if ($this->response)
        {
            return response(array("data"=>"Delete success"),204)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
        }

    }




}
