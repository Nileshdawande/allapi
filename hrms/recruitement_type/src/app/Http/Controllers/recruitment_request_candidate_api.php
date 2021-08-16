<?php

namespace App\Http\Controllers;
use App\Models\Recruitment_request_candidate;
use Illuminate\Http\Request;
class recruitment_request_candidate_api extends Controller
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
            $this->response = Recruitment_request_candidate::paginate($request['limit']);

            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }

            else
            {
                return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
          $this->response = Recruitment_request_candidate::get();

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

    public function store(Request $request)
    {
        $this->response = Recruitment_request_candidate::create($request->all());
        if($this->response)
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("notice"=>"Something is wrong try again"),404)->header("Content-Type","application/json");
        }

    }

    public function show($rec_id)
    {

        $this->response = Recruitment_request_candidate::where("id",$rec_id)->get();

        if(count($this->response) != 0)
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
        }

    }


    public function update(Request $request, $rec_id)
    {
        $this->response = Recruitment_request_candidate::where("id",$rec_id)->update(array(
          "recruitment_request_id"=>$request["recruitment_request_id"],
          "candidate_id"=>$request["candidate_id"],
          "date_of_reg"=>$request["date_of_reg"]
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

    public function destroy($rec_id)
    {

        $this->response = Recruitment_request_candidate::where("id",$rec_id)->delete();

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
