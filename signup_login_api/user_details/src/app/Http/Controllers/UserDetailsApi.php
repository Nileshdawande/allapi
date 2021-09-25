<?php

namespace App\Http\Controllers;
use App\Models\User_detail;
use Illuminate\Http\Request;
class UserDetailsApi extends Controller
{

    private $response;
    private $temp_data;
    private $user_access;
    private $last_id;
    private $formdata;
    private $tempdata;
    public function index(Request $request)
    {

          $this->response = User_detail::get();
          if(count($this->response) != 0)
          {
             unset($request);
             unset($_GET);
             return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
          }

          else
          {
             unset($request);
             unset($_GET);
             unset($this->response);
             return response(array("notice"=>"Data not found"),404)->header("Content-Type","application/json");
          }


    }


    public function store(Request $request)
    {
        $this->response = User_detail::orderBy("id","DESC")->limit(1)->get();

        if(count($this->response) != 0)
        {
           foreach ($this->response as $data)
           {
              $this->last_id = $data['id']+1;
           }
        }

        else
        {
           $this->last_id = 1;
        }

        $this->tempdata = array('url'=>'pms');
        $this->formdata = $request->all();
        $this->formdata['created_by'] = $this->last_id;
        $this->formdata['updated_by'] = $this->last_id;
        $this->formdata['password'] = md5($this->formdata['password']);
        $this->formdata['access'] = json_encode([$this->tempdata]);
        $this->formdata['status'] = 1;
        $this->formdata['role'] = "employee";

        $this->response = User_detail::create($this->formdata);
        if($this->response)
        {
           unset($_POST);
           unset($this->tempdata);
           unset($this->formdata);
           unset($this->last_id);
           return response(array("data"=>$this->response),201)->header("Content-Type","application/json");
        }

        else
        {
           unset($_POST);
           unset($this->tempdata);
           unset($this->formdata);
           unset($this->last_id);
           unset($this->response);
           return response(array("notice"=>"something went wrong try again"),404)->header("Content-Type","application/json");
        }
    }

    public function show($id,Request $request)
    {
        if($id=="login")
        {
            $this->response = User_detail::where([
              ["email",$request['email_id']],
              ["password",md5($request['password'])],
            ])->get();

            if(count($this->response) != 0)
            {
               foreach ($this->response as $key => $data)
               {
                  if(!empty($data['access']) && $data['status'] && $data['role'] != "")
                  {
                    foreach (json_decode($data['access']) as $key => $res)
                    {
                       if($res->url==$request["url"])
                       {
                          $this->temp_data = "find";
                          return response(array("role"=>$data['role'],"access"=>$res->url,"id"=>$data['id']),200)->header("Content-Type","application/json");
                       }
                    }

                    if($this->temp_data != "find")
                    {
                      return response(array("role"=>$data['role'],"access"=>"","id"=>""),200)->header("Content-Type","application/json");
                    }

                  }

                  else
                  {
                    return response(array("role"=>$data['role'],"access"=>"","id"=>""),200)->header("Content-Type","application/json");
                  }

               }
            }

            else
            {
               return response(array("notice"=>"Login Failed"),404)->header("Content-Type","application/json");
            }
        }


        if($id=="dashboardlogin")
        {
            $this->response = User_detail::where([
              ["email",$request['email_id']],
            ])->get();

            if(count($this->response) != 0)
            {
               foreach ($this->response as $key => $data)
               {

                    foreach (json_decode($data['access']) as $key => $res)
                    {
                       if($res->url==$request["url"])
                       {
                          $this->temp_data = "find";
                          return response(array("role"=>$data['role'],"access"=>$res->url,"id"=>$data['id']),200)->header("Content-Type","application/json");
                       }
                    }

                    if($this->temp_data != "find")
                    {
                      return response(array("role"=>$data['role'],"access"=>"","id"=>$data['id']),200)->header("Content-Type","application/json");
                    }

               }
            }

            else
            {
               return response(array("notice"=>"Login Failed"),404)->header("Content-Type","application/json");
            }
        }


        else
        {
             $this->response = User_detail::where("id",$id)->get();
             if(count($this->response) != 0)
             {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
             }

             else
             {
                 return response(array("notice"=>"Not found"),404)->header("Content-Type","application/json");
             }
        }



  }



    public function update(Request $request, $id)
    {

        $this->response = User_detail::where("id",$id)->update(array(
          "firstname"=>$request["firstname"],
          "email"=>$request["email"],
          "role"=>$request["role"],
          "access"=>json_encode($request["access"]),
          "status"=>$request["status"],
          "updated_by"=>$request["updated_by"]
        ));

        if($this->response)
        {
           unset($request);
           unset($id);
           unset($this->response);
           return response(array("data"=>"update success"),200)->header("Content-Type","application/json");
        }

        else
        {
           unset($request);
           unset($id);
           unset($this->response);
           return response(array("data"=>"update failed"),404)->header("Content-Type","application/json");
        }
    }

    public function destroy($id)
    {
        $this->response = User_detail::where("id",$id)->delete();
        if($this->response)
        {
           unset($id);
           unset($this->response);
           return response(array("notice"=>"Delete Success"),200)->header("Content-Type","application/json");
        }

        else
        {
           unset($id);
           unset($this->response);
           return response(array("notice"=>"Delete failed"),404)->header("Content-Type","application/json");
        }
    }




}
