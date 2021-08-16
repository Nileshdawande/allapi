<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\salaryHeadService;
class SalaryHeadApi extends Controller
{

    private $response;
    private $salaryHeadService;
    private $page;
    private $limit;
    public function __construct(salaryHeadService $salaryHeadService)
    {
        $this->salaryHeadService = $salaryHeadService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->salaryHeadService->show_all_salaryHead($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->salaryHeadService->show_all_salaryHead($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->salaryHeadService->create_salaryHead($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->salaryHeadService->show_salaryHead($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->salaryHeadService->update_salaryHead($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->salaryHeadService->delete_salaryHead($id);
        return $data;
    }

}
