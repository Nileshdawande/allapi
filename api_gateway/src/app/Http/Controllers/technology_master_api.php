<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\technology_master_service;
class technology_master_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $technology_master_service;
    private $page;
    private $limit;
    public function __construct(technology_master_service $technology_master_service)
    {
        $this->technology_master_service = $technology_master_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->technology_master_service->show_all_technology($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->technology_master_service->show_all_technology($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->technology_master_service->create_technology($request->all());
        return $data;
    }

    public function show($technology_id,Request $request)
    {
        if($request['limit'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->technology_master_service->show_technology($technology_id,$this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page  = "";
            $this->limit = "";
            $data = $this->technology_master_service->show_technology($technology_id,$this->page,$this->limit);
            return $data;
        }

    }


    public function update(Request $request, $technology_id)
    {
        $data = $this->technology_master_service->update_technology($technology_id,$request->all());
        return $data;
    }

    public function destroy($technology_id)
    {
        $data = $this->technology_master_service->delete_technology($technology_id);
        return $data;
    }

}
