<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\leads_service;
class lead_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $lead_service;
    public function __construct(leads_service $lead_service)
    {
        $this->lead_service = $lead_service;
    }

    public function index(Request $request)
    {
        $data = $this->lead_service->show_all_lead($request->all());
        return $data;
    }


    public function store(Request $request)
    {
       $data = $this->lead_service->create_lead($request->all());
       return $data;
    }

    public function show($lead_id)
    {
        $data = $this->lead_service->show_lead($lead_id);
        return $data;
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
