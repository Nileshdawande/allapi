<?php

namespace App\Http\Controllers;
use App\Models\Lead_source_categorie;
use Illuminate\Http\Request;
class leadSourceCategoryApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    public function index(Request $request)
    {
       if(!empty($request['page']))
       {
          $this->response = \DB::table('lead_source_categories')->paginate($request['limit']);
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
           $this->response = Lead_source_categorie::get();
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
       $this->response = Lead_source_categorie::where("category",$request['category'])->get();
       if(count($this->response) == 0)
       {
         $this->response = Lead_source_categorie::create($request->all());
         return response(array("data"=>"Category created"),201)->header("Content-Type","application/json");
       }

       else
       {
         return response(array("data"=>"Duplicate Entry"),409)->header("Content-Type","application/json");
       }

    }

    public function show($id,Request $request)
    {
        if(!empty($request['limit']))
        {

          $this->response = \DB::table('lead_source_categories')->where("category",'LIKE',$id."%")->paginate($request['limit']);
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

            $this->response = Lead_source_categorie::where("id",$id)->get();
            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
               return response(array("data"=>"Not found"),404)->header("Content-Type","application/json");
            }
        }

    }


    public function update(Request $request, $id)
    {
         $this->response = Lead_source_categorie::where("id",$id)->update(
           array("category"=>str_replace("&nbsp;",'',$request['category']))
         );

         if($this->response)
         {
            return response(array("data"=>"Update Success"),200)->header("Content-Type","application/json");
         }
         else
         {
            return response(array("data"=>"Update Failed"),404)->header("Content-Type","application/json");
         }
    }

    public function destroy($id)
    {
        $this->response = Lead_source_categorie::where("id",$id)->delete();

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
