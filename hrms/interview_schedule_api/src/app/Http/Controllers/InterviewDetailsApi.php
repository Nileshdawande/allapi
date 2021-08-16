<?php

namespace App\Http\Controllers;
use App\Models\Interview_detail;
use Illuminate\Http\Request;
class InterviewDetailsApi extends Controller
{

    private $response;

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = Interview_detail::paginate($request['limit']);

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
            $this->response = Interview_detail::get();

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
        $this->response = Interview_detail::create($request->all());

        if($this->response)
        {
           return response(array("data"=>"Interview schedule created"),201)->header("Content-Type","application/json");
        }
        else
        {
           return response(array("notice"=>"Something went wrong try again"),404)->header("Content-Type","application/json");
        }
    }

    public function show($id)
    {
        $this->response = Interview_detail::where("id",$id)->get();

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

         $this->response = Interview_detail::where("id",$id)->update(array(
           'interview_details_number'=>$request['interview_details_number'],
           'interview_schedule_id'=>$request['interview_schedule_id'],
           'interview_date'=>$request['interview_date'],
           'candidate_id'=>$request['candidate_id'],
           'interview_remarks'=>$request['interview_remarks'],
           'interview_points'=>$request['interview_points'],
           'interview_passed'=>$request['interview_passed']
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
        $this->response = Interview_detail::where("id",$id)->delete();

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
