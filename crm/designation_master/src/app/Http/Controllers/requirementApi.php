<?php

namespace App\Http\Controllers;
use App\Models\Requirement;
use Illuminate\Http\Request;
class requirementApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $all_data;
    private $find_data;
    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = \DB::table('requirements')->paginate($request['limit']);

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
            $this->response = Requirement::get();

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
        $this->response = Requirement::where("requirement_name",$request['requirement_name'])->get();
        if(count($this->response) == 0)
        {
           $this->response = Requirement::create($request->all());
           return response(array("data"=>"Requirement created"),200)->header("Content-Type","application/json");
        }

        else
        {
           return response(array("data"=>"Duplicate entry"),409)->header("Content-Type","application/json");
        }

    }


    public function show($req_id,Request $request)
    {
        if($request['limit'])
        {

          $this->response = \DB::table('requirements')->where("requirement_name",'LIKE',$req_id."%")->paginate($request['limit']);

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
            $this->response = Requirement::where("id",$req_id)->get();

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


    public function update(Request $request, $req_id)
    {

        $this->all_data  = $request->all();
        $this->find_data = Requirement::find($req_id);
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

    public function destroy($req_id)
    {
        $this->response = Requirement::where("id",$req_id)->delete();

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
