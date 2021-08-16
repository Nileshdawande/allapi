<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\InterviewDetails_service;
class InterviewDetailsApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $InterviewDetails_service;
    private $page;
    private $limit;
    public function __construct(InterviewDetails_service $InterviewDetails_service)
    {
        $this->InterviewDetails_service = $InterviewDetails_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->InterviewDetails_service->show_all_interviewDetails($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->InterviewDetails_service->show_all_interviewDetails($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->InterviewDetails_service->create_interviewDetails($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->InterviewDetails_service->show_interviewDetails($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->InterviewDetails_service->update_interviewDetails($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->InterviewDetails_service->delete_interviewDetails($id);
        return $data;
    }

}
