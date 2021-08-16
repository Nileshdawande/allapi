<?php

namespace App\Http\Controllers;
use App\Models\Interviewschedule;
use Illuminate\Http\Request;
class InterviewScheduleApi extends Controller
{

    private $response;

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = Interviewschedule::paginate($request['limit']);

            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
            }
            else
            {
               return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Interviewschedule::get();

            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
            }
            else
            {
               return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
            }
        }

    }


    public function store(Request $request)
    {
        $this->response = Interviewschedule::create($request->all());

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
        $this->response = Interviewschedule::where("id",$id)->get();

        if(count($this->response) != 0)
        {
           return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
        }
        else
        {
           return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
        }
    }


    public function update(Request $request, $id)
    {

         $this->response =  Interviewschedule::where("id",$id)->update(array(
            "interview_schedule_number"=>$request['interview_schedule_number'],
            "recruitment_req_id"=>$request['recruitment_req_id'],
            "interview_schedule_date"=>$request['interview_schedule_date'],
            "interview_schedule_venue"=>$request['interview_schedule_venue']
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
        $this->response = Interviewschedule::where("id",$id)->delete();

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
