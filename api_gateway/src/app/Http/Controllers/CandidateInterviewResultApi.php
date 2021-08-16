<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\CandidateInterviewResult_service;
class CandidateInterviewResultApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $CandidateInterviewResult_service;
    private $page;
    private $limit;
    public function __construct(CandidateInterviewResult_service $CandidateInterviewResult_service)
    {
        $this->CandidateInterviewResult_service = $CandidateInterviewResult_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->CandidateInterviewResult_service->show_all_candidateInterviewResult($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->CandidateInterviewResult_service->show_all_candidateInterviewResult($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->CandidateInterviewResult_service->create_candidateInterviewResult($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->CandidateInterviewResult_service->show_candidateInterviewResult($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->CandidateInterviewResult_service->update_candidateInterviewResult($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->CandidateInterviewResult_service->delete_candidateInterviewResult($id);
        return $data;
    }

}
