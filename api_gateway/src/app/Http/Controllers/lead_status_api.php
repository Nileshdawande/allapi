<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\lead_status_service;
class lead_status_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $lead_service;
    private $limit;
    private $page;
    public function __construct(lead_status_service $lead_service)
    {
        $this->lead_service = $lead_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->limit = $request['limit'];
            $this->page  = $request['page'];
            $data = $this->lead_service->show_all_lead($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->limit = "";
            $this->page  = "";
            $data = $this->lead_service->show_all_lead($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
       $data = $this->lead_service->create_lead($request->all());
       return $data;
    }

    public function show($lead_id,Request $request)
    {
        if($request['limit'])
        {
            $this->limit = $request['limit'];
            $data = $this->lead_service->show_lead($lead_id,$this->limit);
            return $data;
        }

        else
        {
            $this->limit = "";
            $data = $this->lead_service->show_lead($lead_id,$this->limit);
            $data = $this->lead_service->show_lead($lead_id);
            return $data;
        }

    }


    public function update(Request $request, $lead_id)
    {
        $data = $this->lead_service->update_lead($lead_id,$request->all());
        return $data;
    }

    public function destroy($lead_id)
    {
        $data = $this->lead_service->delete_lead($lead_id);
        return $data;
    }

}
