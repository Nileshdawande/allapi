<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\ParameterMaster_service;
class ParameterMasterApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $ParameterMaster_service;
    private $page;
    private $limit;
    public function __construct(ParameterMaster_service $ParameterMaster_service)
    {
        $this->ParameterMaster_service = $ParameterMaster_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->ParameterMaster_service->show_all_parametermaster($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->ParameterMaster_service->show_all_parametermaster($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->ParameterMaster_service->create_parametermaster($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->ParameterMaster_service->show_parametermaster($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->ParameterMaster_service->update_parametermaster($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->ParameterMaster_service->delete_parametermaster($id);
        return $data;
    }

}
