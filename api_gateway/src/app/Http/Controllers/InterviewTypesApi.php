<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\interviewTypes_service;
class InterviewTypesApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $interviewTypes_service;
    private $page;
    private $limit;
    public function __construct(interviewTypes_service $interviewTypes_service)
    {
        $this->interviewTypes_service = $interviewTypes_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->interviewTypes_service->show_all_interviewType($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->interviewTypes_service->show_all_interviewType($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->interviewTypes_service->create_interviewType($request->all());
        return $data;
    }

    public function show($id,Request $request)
    {
        if($request['limit'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->interviewTypes_service->show_interviewType($id,$this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->interviewTypes_service->show_interviewType($id,$this->page,$this->limit);
            return $data;
        }

    }


    public function update(Request $request, $id)
    {
        $data = $this->interviewTypes_service->update_interviewType($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->interviewTypes_service->delete_interviewType($id);
        return $data;
    }

}
