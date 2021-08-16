<?php

namespace App\Http\Controllers;
use App\Models\Candidate_master;
use Illuminate\Http\Request;
class CandidateMasterApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    public function index(Request $request)
    {
       $this->response = Candidate_master::get();
       if(count($this->response) !=0)
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
         $this->response = Candidate_master::create($request->all());

         if($this->response)
         {
            return response(array("data"=>"Recored created"),201)->header("Content-Type","application/json");
         }

         else
         {
            return response(array("notice"=>"Recored not created"),404)->header("Content-Type","application/json");
         }
    }

    public function show($id,Request $request)
    {

        if($id=="email")
        {

            $this->response = Candidate_master::where("candidate_email",$request['email'])->get();
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
            $this->response = Candidate_master::where("id",$id)->get();
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


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $this->response = Candidate_master::where("id",$id)->delete();
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
