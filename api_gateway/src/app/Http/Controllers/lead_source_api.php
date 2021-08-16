<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\lead_source_service;
class lead_source_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $lead_service;
    private $page;
    private $limit;
    public function __construct(lead_source_service $lead_service)
    {
        $this->lead_service = $lead_service;
    }

    public function index(Request $request)
    {
        $this->page = $request['page'];
        if(!empty($this->page))
        {
            $this->limit = $request['limit'];
            $data = $this->lead_service->show_all_lead_source($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->lead_service->show_all_lead_source($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
       $data = $this->lead_service->create_lead_source($request->all());
       return $data;
    }

    public function show($lead_id,Request $request)
    {
        $this->limit = $request['limit'];
        if(empty($this->limit))
        {
            $this->limit = "";
            $data = $this->lead_service->show_lead_source($lead_id,$this->limit);
            return $data;
        }

        else
        {
          $data = $this->lead_service->show_lead_source($lead_id,$this->limit);
          return $data;
        }

    }


    public function update(Request $request, $lead_id)
    {
        $data = $this->lead_service->update_lead_source($lead_id,$request->all());
        return $data;
    }

    public function destroy($lead_id)
    {
        $data = $this->lead_service->delete_lead_source($lead_id);
        return $data;
    }

}
