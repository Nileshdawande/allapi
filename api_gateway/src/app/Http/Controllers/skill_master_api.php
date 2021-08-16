<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\skill_master_service;
class skill_master_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $skill_master_service;
    private $page;
    private $limit;
    public function __construct(skill_master_service $skill_master_service)
    {
        $this->skill_master_service = $skill_master_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
           $this->page = $request['page'];
           $this->limit = $request['limit'];
           $data = $this->skill_master_service->show_all_skill($this->page,$this->limit);
           return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->skill_master_service->show_all_skill($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->skill_master_service->create_skill($request->all());
        return $data;
    }

    public function show($skill_id,Request $request)
    {
        if($request['limit'])
        {
            $this->limit = $request['limit'];
            $data = $this->skill_master_service->show_skill($skill_id,$this->limit);
            return $data;
        }

        else
        {
            $this->limit = "";
            $data = $this->skill_master_service->show_skill($skill_id,$this->limit);
            return $data;
        }

    }


    public function update(Request $request, $skill_id)
    {
        $data = $this->skill_master_service->update_skill($skill_id,$request->all());
        return $data;
    }

    public function destroy($skill_id)
    {
        $data = $this->skill_master_service->delete_skill($skill_id);
        return $data;
    }

}
