<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\recruitment_request_service;
class recruitment_request_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $recruitment_request_service;
    public function __construct(recruitment_request_service $recruitment_request_service)
    {
        $this->recruitment_request_service = $recruitment_request_service;
    }

    public function index(Request $request)
    {
        $data = $this->recruitment_request_service->show_all_recruitment();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->recruitment_request_service->create_recruitment($request->all());   
        return $data;
    }

    public function show($rec_id)
    {
        $data = $this->recruitment_request_service->show_recruitment($rec_id);
        return $data;
    }


    public function update(Request $request, $rec_id)
    {
        $data = $this->recruitment_request_service->update_recruitment($rec_id,$request->all());
        return $data;        
    }

    public function destroy($rec_id)
    {
        $data = $this->recruitment_request_service->delete_recruitment($rec_id);
        return $data;        
    }

}
