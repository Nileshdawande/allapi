<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\TaskTypeService;
class TaskTypeMasterApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $TaskTypeService;
    public function __construct(TaskTypeService $TaskTypeService)
    {
        $this->TaskTypeService = $TaskTypeService;
    }

    public function index(Request $request)
    {
        $data = $this->TaskTypeService->show_all_taskType();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->TaskTypeService->create_taskType($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->TaskTypeService->show_taskType($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->TaskTypeService->update_taskType($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->TaskTypeService->delete_taskType($id);
        return $data;
    }

}
