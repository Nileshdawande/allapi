<?php

namespace App\Http\Controllers;
use App\Models\Skill_master;
use Illuminate\Http\Request;
class skill_master_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return voskill_id
     */

    private $response;
    private $page;
    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = Skill_master::paginate($request['limit']);

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
          $this->response = Skill_master::get();

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

        $this->response = Skill_master::create($request->all());

        if ($this->response)
        {
            return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Somethin is wrong try again"),404)->header("Content-Type","application/json");
        }

    }

    public function show($skill_id,Request $request)
    {

        if($request['limit'])
        {
            $this->response = Skill_master::where("skill_name","LIKE",$skill_id."%")->paginate($request['limit']);

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
            $this->response = Skill_master::where("id",$skill_id)->get();

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


    public function update(Request $request, $skill_id)
    {
        $this->response = Skill_master::where("id",$skill_id)->update(array(
          "skill_name"=>$request['skill_name']
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

    public function destroy($skill_id)
    {
        $this->response = Skill_master::where("id",$skill_id)->delete();

        if ($this->response)
        {
            return response(array("data"=>"Delete success"),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
        }

    }




}
