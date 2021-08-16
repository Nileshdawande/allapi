<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\report_service;
class report_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $report_service;
    private $fetch_type;
    private $page;
    private $limit;
    public function __construct(report_service $report_service)
    {
        $this->report_service = $report_service;
    }

    public function index(Request $request)
    {
        $this->fetch_type = $request['fetch_type'];
        $this->page = $request['page'];
        $this->limit = $request['limit'];
        $data = $this->report_service->get_report($this->fetch_type,$this->page,$this->limit );
        return $data;
    }

    public function store(Request $request)
    {
       $data = $this->report_service->create_report($request->all());
       return $data;
    }


}
