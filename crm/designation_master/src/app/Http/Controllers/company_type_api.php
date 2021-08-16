<?php

namespace App\Http\Controllers;
use App\Models\Company_type;
use Illuminate\Http\Request;
class company_type_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $response;
    public function index(Request $request)
    {
       if($request['page'])
       {
           $this->response = Company_type::paginate($request['limit']);

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
           $this->response = Company_type::get();
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
        $this->response = Company_type::where("company_type_name",$request['company_type_name'])->get();
        if(count($this->response) == 0)
        {
          $this->response = Company_type::create($request->all());
          return response(array("data"=>"Company type created successfully"),201)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("data"=>"Duplicate entry"),409)->header("Content-Type","application/json");
        }
    }

    public function show($id,Request $request)
    {

      if($request['page'])
      {

        $this->response = Company_type::where("company_type_name","LIKE",$id."%")->paginate($request['limit']);

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
          $this->response = Company_type::where("id",$id)->get();
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


    public function update(Request $request, $id)
    {
        $this->response = Company_type::where("id",$id)->update(
          array("company_type_name"=>str_replace("&nbsp;","",$request['company_type_name']))
        );

        if($this->response)
        {
            return response(array("data"=>"Update Success"),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("notice"=>"Update Failed"),404)->header("Content-Type","application/json");
        }
    }

    public function destroy($id)
    {
        $this->response = Company_type::where("id",$id)->delete();
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
