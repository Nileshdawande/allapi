<?php

namespace App\Http\Controllers;
use App\Models\Dipartment_master;
use Illuminate\Http\Request;
class dipartmentApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $limit;
    private $all_data;
    private $find_data;
    public function index(Request $request)
    {


          $this->response = Dipartment_master::get();
          if(count($this->response) != 0)
          {
              return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
          }

          else
          {
              return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
          }


    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->response = Dipartment_master::where("dipartment_name",$request['dipartment_name'])->get();
        if(count($this->response) == 0)
        {
           $this->response = Dipartment_master::create($request->all());
           return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
        }

        else
        {
           return response(array("notice"=>"Duplicate Entry"),409)->header("Content-Type","application/json");
        }

    }

    public function show($dipartment_id,Request $request)
    {
      
      $this->response = Dipartment_master::where("id",$dipartment_id)->get();

      if(count($this->response) != 0)
      {
          return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
      }

      else
      {
          return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
      }

    }


    public function update(Request $request, $dipartment_id)
    {
        $this->all_data  = $request->all();
        $this->find_data = Dipartment_master::find($dipartment_id);
        $this->response  = $this->find_data->update($this->all_data);

        if($this->response)
        {
            return response(array("data"=>"Update Success"),200)->header("Content-Type","application/json");
        }
        else
        {
            return response(array("notice"=>"Update Failed"),404)->header("Content-Type","application/json");
        }

    }

    public function destroy($dipartment_id)
    {

        $this->response = Dipartment_master::where("id",$dipartment_id)->delete();

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
