<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\TaskService;
class TaskApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $TaskService;
    private $fetch_type;
    public function __construct(TaskService $TaskService)
    {
        $this->TaskService = $TaskService;
    }

    public function index(Request $request)
    {
        $data = $this->TaskService->show_all_task();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->TaskService->create_task($request->all());
        return $data;
    }

    public function show($id,Request $request)
    {
        if($request['fetch_type'])
        {
            $this->fetch_type = $request['fetch_type'];
            $data = $this->TaskService->show_task($id,$this->fetch_type);
            return $data;
        }

        else
        {
            $this->fetch_type = "";
            $data = $this->TaskService->show_task($id,$this->fetch_type);
            return $data;
        }

    }


    public function update(Request $request, $id)
    {
        $data = $this->TaskService->update_task($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->TaskService->delete_task($id);
        return $data;
    }

}
