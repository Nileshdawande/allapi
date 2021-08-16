<?php

namespace App\Http\Controllers;
use App\Models\Recruitment;
use Illuminate\Http\Request;
class recruitment_api extends Controller
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
           $this->response = Recruitment::paginate($request['limit']);

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
           $this->response = Recruitment::get();

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
        $this->response = Recruitment::create($request->all());
        if($this->response)
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("notice"=>"Something is wrong try again"),404)->header("Content-Type","application/json");
        }

    }

    public function show($rec_id,Request $request)
    {

        if($request['limit'])
        {
            $this->response = Recruitment::where("recruitment_type_name","LIKE",$rec_id."%")->paginate($request['limit']);

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
            $this->response = Recruitment::where("id",$rec_id)->get();

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


    public function update(Request $request, $rec_id)
    {
         $this->response = Recruitment::where("id",$rec_id)->update(array(
           "recruitment_type_name"=>$request['recruitment_type_name']
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

        $this->response = Recruitment::where("id",$rec_id)->delete();

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
