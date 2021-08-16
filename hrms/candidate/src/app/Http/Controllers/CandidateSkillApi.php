<?php

namespace App\Http\Controllers;
use App\Models\Candidate_skill;
use Illuminate\Http\Request;
class CandidateSkillApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $page;
    private $limit;
    public function index(Request $request)
    {
       if($request['page'])
       {
           $this->response = Candidate_skill::paginate($request['limit']);
           if(count($this->response) !=0)
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
           $this->response = Candidate_skill::get();
           if(count($this->response) !=0)
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
         $this->response = Candidate_skill::create($request->all());

         if($this->response)
         {
            return response(array("data"=>"Recored created"),201)->header("Content-Type","application/json");
         }

         else
         {
            return response(array("notice"=>"Recored not created"),404)->header("Content-Type","application/json");
         }
    }

    public function show($id)
    {
        $this->response = Candidate_skill::where("id",$id)->get();
        if(count($this->response) !=0)
        {
           return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
           return response(array("notice"=>"Not Found"),404)->header("Content-Type","application/json");
        }
    }


    public function update(Request $request, $id)
    {
         $this->response = Candidate_skill::where("id",$id)->update(array(
           "candidate_id"=>$request["candidate_id"],
           "candidate_skill_id"=>$request["candidate_skill_id"],
           "level"=>$request["level"]
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
        $this->response = Candidate_skill::where("id",$id)->delete();
        if($this->response)
        {
           return response(array("data"=>"Delete Success"),200)->header("Content-Type","application/json");
        }

        else
        {
           return response(array("notice"=>"Not Deleted"),404)->header("Content-Type","application/json");
        }
    }




}
