<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\followup_service;
class followup_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $followup_service;
    public function __construct(followup_service $followup_service)
    {
        $this->followup_service = $followup_service;
    }

    public function index(Request $request)
    {
      
        $data = $this->followup_service->show_all_followup($request->all());
        return $data;
    }


    public function store(Request $request)
    {
       $data = $this->followup_service->create_followup($request->all());
       return $data;
    }

    public function show($followup_id)
    {
        $data = $this->followup_service->show_followup($followup_id);
        return $data;
    }


    public function update(Request $request, $followup_id)
    {
        $data = $this->followup_service->update_followup($followup_id,$request->all());
        return $data;
    }

    public function destroy($followup_id)
    {
        $data = $this->followup_service->delete_followup($followup_id);
        return $data;
    }

}
