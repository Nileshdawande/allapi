<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\contract_service;
class contract_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $contract_service;
    private $page;
    private $limit;
    public function __construct(contract_service $contract_service)
    {
        $this->contract_service = $contract_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->limit = $request['limit'];
            $this->page  = $request['page'];
            $data = $this->contract_service->show_all_contract($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->limit = "";
            $this->page  = "";
            $data = $this->contract_service->show_all_contract($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
       $data = $this->contract_service->create_contract($request->all());
       return $data;
    }

    public function show($contract_id,Request $request)
    {
        if($request['limit'])
        {
            $this->limit = $request['limit'];
            $data = $this->contract_service->show_contract($contract_id,$this->limit);
            return $data;
        }

        else
        {
            $this->limit = "";
            $data = $this->contract_service->show_contract($contract_id,$this->limit);
            return $data;
        }

    }


    public function update(Request $request, $contract_id)
    {
        $data = $this->contract_service->update_contract($contract_id,$request->all());
        return $data;
    }

    public function destroy($contract_id)
    {
        $data = $this->contract_service->delete_contract($contract_id);
        return $data;
    }

}
