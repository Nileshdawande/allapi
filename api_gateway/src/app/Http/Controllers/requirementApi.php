<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\requirement_service;
class requirementApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $requirement_service;
    private $page;
    private $limit;
    public function __construct(requirement_service $requirement_service)
    {
        $this->requirement_service = $requirement_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->requirement_service->show_all_requirement($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->requirement_service->show_all_requirement($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->requirement_service->create_requirement($request->all());
        return $data;
    }

    public function show($req_id,Request $request)
    {
        if($request['limit'])
        {
            $this->limit = $request['limit'];
            $data = $this->requirement_service->show_requirement($req_id,$this->limit);
            return $data;
        }

        else
        {
            $this->limit = "";
            $data = $this->requirement_service->show_requirement($req_id,$this->limit);
            return $data;
        }

    }


    public function update(Request $request, $req_id)
    {
        $data = $this->requirement_service->update_requirement($req_id,$request->all());
        return $data;
    }

    public function destroy($req_id)
    {
        $data = $this->requirement_service->delete_requirement($req_id);
        return $data;
    }

}
