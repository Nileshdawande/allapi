<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\candidateSkill_service;
class CandidateSkillApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $candidateSkill_service;
    private $page;
    private $limit;
    public function __construct(candidateSkill_service $candidateSkill_service)
    {
        $this->candidateSkill_service = $candidateSkill_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->candidateSkill_service->show_all_candidate($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->candidateSkill_service->show_all_candidate($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->candidateSkill_service->create_candidate($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->candidateSkill_service->show_candidate($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->candidateSkill_service->update_candidate($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->candidateSkill_service->delete_candidate($id);
        return $data;
    }

}
