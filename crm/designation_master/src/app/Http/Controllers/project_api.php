<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
class project_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $formdata;
    private $temp_members = [];
    public function index(Request $request)
    {
        $this->response = Project::get();
        if (count($this->response) !=0)
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
        }
    }


    public function store(Request $request)
    {
        $this->formdata = $request->all();
        $this->formdata['members'] = json_encode($this->formdata['members']);

        $this->response = Project::create($this->formdata);

        if($this->response)
        {
            return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("Notice"=>"Something is wrong try again"),404)->header("Content-Type","application/json");
        }

    }

    public function show($project_id,Request $request)
    {

        if($request["fetch_type"] == "userid")
        {

            $this->response = Project::where("project_leader",$project_id)->get();
            if (count($this->response) !=0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }

            else
            {
                $this->response = Project::get();
                foreach($this->response as $data)
                {
                   foreach(json_decode($data['members']) as $member)
                   {
                      if($member == $project_id)
                      {
                         array_push($this->temp_members,$data);
                      }
                   }

                }

                if(count($this->temp_members) != 0)
                {
                  return response(array("data"=>$this->temp_members),200)->header("Content-Type","application/json");
                }

                else
                {
                  return response(array("notice"=>"Not found"),404)->header("Content-Type","application/json");
                }



            }

        }

        else
        {
            $this->response = Project::where("id",$project_id)->get();
            if (count($this->response) !=0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }

            else
            {
                return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
            }
        }

    }


    public function update(Request $request, $project_id)
    {

       $this->response = Project::where("id",$project_id)->update(array(
        "project_name"=>$request["project_name"],
        "contract_name"=>$request["contract_name"],
        "project_start_date"=>$request["project_start_date"],
        "project_expected_date"=>$request["project_expected_date"],
        "requirement_category"=>$request["requirement_category"],
        "project_actual_date"=>$request["project_actual_date"],
        "project_details"=>$request["project_details"],
        "project_leader"=>$request["project_leader"],
        "status"=>$request["status"],
        "project_key"=>$request["project_key"],
        "members"=>$request["members"]

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

    public function destroy($project_id)
    {
       $this->response = Project::where("id",$project_id)->delete();

       if($this->response)
       {
            return response(array("notice"=>"Delete Success"),200)->header("Content-Type","application/json");
       }

       else
       {
          return response(array("notice"=>"Delete Failed"),404)->header("Content-Type","application/json");
       }


    }




}
