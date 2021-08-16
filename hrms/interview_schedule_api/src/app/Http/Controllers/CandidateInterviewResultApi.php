<?php

namespace App\Http\Controllers;
use App\Models\Candidate_interview_result;
use Illuminate\Http\Request;
class CandidateInterviewResultApi extends Controller
{

    private $response;

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = Candidate_interview_result::paginate($request['limit']);

            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
               return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Candidate_interview_result::get();

            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
               return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
            }
        }

    }


    public function store(Request $request)
    {
        $this->response = Candidate_interview_result::create($request->all());

        if($this->response)
        {
           return response(array("data"=>"Interview schedule created"),201)->header("Content-Type","application/json");
        }
        else
        {
           return response(array("notice"=>"Something went wrong try again"),404)->header("Content-Type","application/json");
        }
    }

    public function show($id,Request $request)
    {
        $this->response = Candidate_interview_result::where("id",$id)->get();

        if(count($this->response) != 0)
        {
           return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }
        else
        {
           return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
        }
    }


    public function update(Request $request, $id)
    {

         $this->response = Candidate_interview_result::where("id",$id)->update(array(
           'parameter_id'=>$request['parameter_id'],
           'parameter_points'=>$request['parameter_points']
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

    public function destroy($id)
    {
        $this->response = Candidate_interview_result::where("id",$id)->delete();

        if($this->response)
        {
           return response(array("notice"=>"Delete success"),200)->header("Content-Type","application/json");
        }
        else
        {
           return response(array("notice"=>"Not deleted"),404)->header("Content-Type","application/json");
        }
    }


}
