<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\UserService;
class UserDetailsApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $UserService;
    private $page;
    private $limit;
    private $firstname;
    private $email_id;
    private $password;
    private $url;
    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }

    public function index(Request $request)
    {
       $data = $this->UserService->show_all_User();
       return $data;
    }


    public function store(Request $request)
    {
        $data = $this->UserService->create_User($request->all());
        return $data;
    }

    public function show($id,Request $request)
    {
        if($id == "login")
        {
             $this->email_id = $request['email_id'];
             $this->password = $request['password'];
             $this->url = $request['url'];
             $data = $this->UserService->show_User($id,$this->email_id,$this->password,$this->url);
             return $data;
        }

        if($id == "dashboardlogin")
        {
          $this->password = "";
          $this->url = $request['url'];
          $this->email_id = $request['email_id'];
          $data = $this->UserService->show_User($id,$this->email_id,$this->password,$this->url);
          return $data;
        }

        if($id == "page")
        {
            $this->firstname = $request['firstname'];
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->UserService->show_User($id,$this->firstname,$this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->email_id = "";
            $this->password = "";
            $this->url = "";
            $data = $this->UserService->show_User($id,$this->email_id,$this->password,$this->url);
            return $data;
        }

    }


    public function update(Request $request, $id)
    {
        $data = $this->UserService->update_User($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->UserService->delete_User($id);
        return $data;
    }

}
