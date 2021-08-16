<?php

namespace App\Http\Controllers;
use App\Models\Technologywise_skill;
use Illuminate\Http\Request;
class technology_with_skill_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return votechnology_id
     */

    private $response;
    public function index(Request $request)
    {
        $this->response = Technologywise_skill::get();

        if (count($this->response) != 0) 
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
        }
    }

    public function store(Request $request)
    {

        $this->response = Technologywise_skill::create($request->all());
        
        if ($this->response) 
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Somethin is wrong try again"),404)->header("Content-Type","application/json");
        }      

    }

    public function show($technology_id)
    {

        $this->response = Technologywise_skill::where("id",$technology_id)->get();
        
        if (count($this->response) != 0) 
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
        }

    }


    public function update(Request $request, $technology_id)
    {
        //
    }

    public function destroy($technology_id)
    {

        $this->response = Technologywise_skill::where("id",$technology_id)->delete();
        
        if ($this->response) 
        {
            return response(array("data"=>"Delete success"),204)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
        }

    }




}
