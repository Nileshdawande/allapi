<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\interaction_service;
class interaction_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $interaction_service;
    private $page;
    private $limit;
    public function __construct(interaction_service $interaction_service)
    {
        $this->interaction_service = $interaction_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
             $this->page  = $request['page'];
             $this->limit = $request['limit'];
             $data = $this->interaction_service->show_all_interaction($this->page,$this->limit);
             return $data;
        }

        else
        {
            $this->page  = "";
            $this->limit = "";
            $data = $this->interaction_service->show_all_interaction($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
       $data = $this->interaction_service->create_interaction($request->all());
       return $data;
    }

    public function show($interaction_id,Request $request)
    {
        if($request['limit'])
        {
           $this->limit = $request['limit'];
           $data = $this->interaction_service->show_interaction($interaction_id,$this->limit);
           return $data;
        }
        else
        {
            $this->limit = "";
            $data = $this->interaction_service->show_interaction($interaction_id,$this->limit);
            return $data;
        }

    }


    public function update(Request $request, $interaction_id)
    {
        $data = $this->interaction_service->update_interaction($interaction_id,$request->all());
        return $data;
    }

    public function destroy($interaction_id)
    {
        $data = $this->interaction_service->delete_interaction($interaction_id);
        return $data;
    }

}
