<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\TaskStatusService;
class TaskStatusMasterApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $TaskStatusService;
    public function __construct(TaskStatusService $TaskStatusService)
    {
        $this->TaskStatusService = $TaskStatusService;
    }

    public function index(Request $request)
    {
        $data = $this->TaskStatusService->show_all_taskStatus();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->TaskStatusService->create_taskStatus($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->TaskStatusService->show_taskStatus($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->TaskStatusService->update_taskStatus($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->TaskStatusService->delete_taskStatus($id);
        return $data;
    }

}
