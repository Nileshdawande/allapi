<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\interviewSchedule_service;
class InterviewScheduleApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $interviewSchedule_service;
    private $page;
    private $limit;
    public function __construct(interviewSchedule_service $interviewSchedule_service)
    {
        $this->interviewSchedule_service = $interviewSchedule_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->interviewSchedule_service->show_all_interviewSchedule($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->interviewSchedule_service->show_all_interviewSchedule($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->interviewSchedule_service->create_interviewSchedule($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->interviewSchedule_service->show_interviewSchedule($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->interviewSchedule_service->update_interviewSchedule($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->interviewSchedule_service->delete_interviewSchedule($id);
        return $data;
    }

}
