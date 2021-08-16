<?php

namespace App\Http\Controllers;
use App\Models\Recruitment_request;
use Illuminate\Http\Request;
class recruitment_request_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    public function index(Request $request)
    {
        $this->response = Recruitment_request::get();

        if(count($this->response) != 0)
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
        $this->response = Recruitment_request::create($request->all());
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

        $this->response = Recruitment_request::where("id",$rec_id)->get();

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
        //
    }

    public function destroy($rec_id)
    {

        $this->response = Recruitment_request::where("id",$rec_id)->delete();

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
