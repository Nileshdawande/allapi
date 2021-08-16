<?php

namespace App\Http\Controllers;
use App\Models\Lead_source;
use Illuminate\Http\Request;
class lead_source_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $limit;
    public function index(Request $request)
    {

       if($request['page'])
       {
          $this->response = \DB::table('lead_sources')->paginate($request['limit']);

           if(count($this->response) != 0)
           {
              return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
           }
           else
           {
                return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
           }

       }

       else
       {

       $this->response = Lead_source::get();

       if(count($this->response) != 0)
       {
          return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
       }
       else
       {
            return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
       }
       }

    }

    public function store(Request $request)
    {
       $this->response = Lead_source::where("lead_source_name",$request['lead_source_name'])->get();
       if(count($this->response) == 0)
       {
          $this->response = Lead_source::create($request->all());
          return response(array("data"=>"Lead source created"),201)->header("Content-Type","application/json");
       }
       else
       {
          return response(array("data"=>"Duplicate entry"),409)->header("Content-Type","application/json");
       }



    }


    public function show($lead_id,Request $request)
    {
       $this->limit = $request['limit'];
       if(empty($this->limit))
       {

         $this->response = Lead_source::where("id",$lead_id)->get();
         if(count($this->response) != 0)
         {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
         }
         else
         {
              return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
         }

       }

       else
       {

         $this->response = \DB::table('lead_sources')->where("lead_source_name","LIKE",$lead_id."%")->paginate($request['limit']);

          if(count($this->response) != 0)
          {
             return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
          }
          else
          {
               return response(array("data"=>"Not Found"),404)->header("Content-Type","application/json");
          }

       }



    }


    public function update(Request $request, $lead_id)
    {
       $this->response = Lead_source::where("id",$lead_id)->update(array(
        'lead_source_name'=>str_replace('&nbsp;','',$request['lead_source_name']),
        'lead_source_parent'=>str_replace('&nbsp;','',$request['lead_source_parent'])
        ));

      if($this->response)
       {
          return response(array("data"=>"Update Sucess"),200)->header("Content-Type","application/json");
       }

       else
       {
            return response(array("data"=>"Update Failed"),404)->header("Content-Type","application/json");
       }

    }

    public function destroy($lead_id)
    {
       $this->response = Lead_source::where("id",$lead_id)->delete();

      if($this->response)
       {
          return response(array("data"=>"Delete Sucess"),200)->header("Content-Type","application/json");
       }
       else
       {
            return response(array("data"=>"Delete Failed"),404)->header("Content-Type","application/json");
       }

    }




}
