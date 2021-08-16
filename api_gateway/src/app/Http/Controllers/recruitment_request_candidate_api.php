<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\recruitment_request_candidate_service;
class recruitment_request_candidate_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $recruitment_request_candidate_service;
    private $page;
    private $limit;
    public function __construct(recruitment_request_candidate_service $recruitment_request_candidate_service)
    {
        $this->recruitment_request_candidate_service = $recruitment_request_candidate_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->recruitment_request_candidate_service->show_all_recruitment($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->recruitment_request_candidate_service->show_all_recruitment($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->recruitment_request_candidate_service->create_recruitment($request->all());
        return $data;
    }

    public function show($rec_id)
    {
        $data = $this->recruitment_request_candidate_service->show_recruitment($rec_id);
        return $data;
    }


    public function update(Request $request, $rec_id)
    {
        $data = $this->recruitment_request_candidate_service->update_recruitment($rec_id,$request->all());
        return $data;
    }

    public function destroy($rec_id)
    {
        $data = $this->recruitment_request_candidate_service->delete_recruitment($rec_id);
        return $data;
    }

}
