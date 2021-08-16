<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\candidatemaster_service;
class CandidateMasterApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $candidatemaster_service;
    private $email_id;
    public function __construct(candidatemaster_service $candidatemaster_service)
    {
        $this->candidatemaster_service = $candidatemaster_service;
    }

    public function index(Request $request)
    {
        $data = $this->candidatemaster_service->show_all_candidate();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->candidatemaster_service->create_candidate($request->all());
        return $data;
    }

    public function show($id,Request $request)
    {
        if($id=="email")
        {
            $this->email_id = $request['email'];
            $data = $this->candidatemaster_service->show_candidate($id,$this->email_id);
            return $data;
        }

        else
        {
            $this->email_id = "";
            $data = $this->candidatemaster_service->show_candidate($id,$this->email_id);
            return $data;
        }

    }


    public function update(Request $request, $id)
    {
        $data = $this->candidatemaster_service->update_candidate($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->candidatemaster_service->delete_candidate($id);
        return $data;
    }

}
