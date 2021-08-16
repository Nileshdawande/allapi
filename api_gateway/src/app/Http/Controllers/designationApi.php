<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\designation_service;
class designationApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $designation_service;
    private $limit;
    private $page;
    public function __construct(designation_service $designation_service)
    {
        $this->designation_service = $designation_service;
    }

    public function index(Request $request)
    {
        $data = $this->designation_service->show_all_designation();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->designation_service->create_designation($request->all());
        return $data;
    }

    public function show($designation_id,Request $request)
    {
        $data = $this->designation_service->show_designation($designation_id);
        return $data;
    }


    public function update(Request $request, $designation_id)
    {
        $data = $this->designation_service->update_designation($designation_id,$request->all());
        return $data;
    }

    public function destroy($designation_id)
    {
        $data = $this->designation_service->delete_designation($designation_id);
        return $data;
    }

}
