<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\project_service;
class project_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $project_service;
    private $page;
    private $limit;
    private $fetch_type;
    public function __construct(project_service $project_service)
    {
        $this->project_service = $project_service;
    }

    public function index(Request $request)
    {
        $data = $this->project_service->show_all_project();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->project_service->create_project($request->all());
        return $data;
    }

    public function show($project_id,Request $request)
    {

       if($request['fetch_type'])
       {
           $this->fetch_type = $request['fetch_type'];
           $data = $this->project_service->show_project($project_id,$this->fetch_type);
           return $data;
       }

       else
       {
           $this->fetch_type = "";
           $data = $this->project_service->show_project($project_id,$this->fetch_type);
           return $data;
       }

    }


    public function update(Request $request, $project_id)
    {
        $data = $this->project_service->update_project($project_id,$request->all());
        return $data;
    }

    public function destroy($project_id)
    {
        $data = $this->project_service->delete_project($project_id);
        return $data;
    }

}
