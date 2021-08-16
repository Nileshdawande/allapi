<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\CandidateInterviewSchedule_service;
class CandidateInterviewScheduleApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $CandidateInterviewSchedule_service;
    private $page;
    private $limit;
    public function __construct(CandidateInterviewSchedule_service $CandidateInterviewSchedule_service)
    {
        $this->CandidateInterviewSchedule_service = $CandidateInterviewSchedule_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->CandidateInterviewSchedule_service->show_all_candidateInterviewSchedule($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->CandidateInterviewSchedule_service->show_all_candidateInterviewSchedule($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $file = $request->file('attachments');
        $location = $file->getPathName();
        $fname = $file->getClientOriginalName();
        $alldata = $request->all();
        $alldata['location'] = $location;
        $alldata['filename'] = $fname;
        $data = $this->CandidateInterviewSchedule_service->create_candidateInterviewSchedule($alldata);
        return $data;
    }

    public function show($id)
    {
        $data = $this->CandidateInterviewSchedule_service->show_candidateInterviewSchedule($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->CandidateInterviewSchedule_service->update_candidateInterviewSchedule($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->CandidateInterviewSchedule_service->delete_candidateInterviewSchedule($id);
        return $data;
    }

}
