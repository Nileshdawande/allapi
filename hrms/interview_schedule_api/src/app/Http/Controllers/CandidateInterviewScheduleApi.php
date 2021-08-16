<?php

namespace App\Http\Controllers;
use App\Models\Candidate_interview_schedule;
use Illuminate\Http\Request;
require '../vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;

class CandidateInterviewScheduleApi extends Controller
{

    private $response;
    private $file;
    private $last_id;
    private $folder_name;
    private $data;
    private $alldata;
    private $filename;
    private $location;
    private $path;
    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = Candidate_interview_schedule::paginate($request['limit']);

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
            $this->response = Candidate_interview_schedule::get();

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

        $this->file = $request->all();
        $this->response = Candidate_interview_schedule::orderBy("id","desc")->limit(1)->get();

        if(count($this->response) != 0)
        {
            foreach($this->response as $this->data)
            {
                $this->last_id = $this->data->id+1;
            }
        }

        else
        {
           $this->last_id = 1;
        }

        $this->filename = $this->last_id."_".$this->file['filename'];
        $img = Image::make($this->file['location']);
        $img->fit(300, 200);
        $img->save($this->filename);

        $this->alldata = $request->all();
        $this->alldata['attachments'] = $this->filename;

        $this->response = Candidate_interview_schedule::create($this->alldata);

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
        $this->response = Candidate_interview_schedule::where("id",$id)->get();

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

         // $this->response = Candidate_interview_schedule::where("id",$id)->update(array(
         //   'Candidate_interview_schedules_number'=>$request['Candidate_interview_schedules_number'],
         //   'interview_schedule_id'=>$request['interview_schedule_id'],
         //   'interview_date'=>$request['interview_date'],
         //   'candidate_id'=>$request['candidate_id'],
         //   'interview_remarks'=>$request['interview_remarks'],
         //   'interview_points'=>$request['interview_points'],
         //   'interview_passed'=>$request['interview_passed']
         // ));
         //
         // if($this->response)
         // {
         //    return response(array("notice"=>"Update Success"),200)->header("Content-Type","application/json");
         // }
         //
         // else
         // {
         //    return response(array("notice"=>"Update Failed"),404)->header("Content-Type","application/json");
         // }
    }

    public function destroy($id)
    {
        $this->response = Candidate_interview_schedule::where("id",$id)->delete();

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
