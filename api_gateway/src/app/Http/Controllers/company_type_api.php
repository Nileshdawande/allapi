<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\company_type_service;
class company_type_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $company_service;
    private $limit;
    private $page;
    public function __construct(company_type_service $company_service)
    {
        $this->company_service = $company_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->limit = $request['limit'];
            $this->page  = $request['page'];
            $data = $this->company_service->show_all_company_type($this->page,$this->limit);
            return $data;
        }

        else
        {
          $this->limit = "";
          $this->page  = "";
          $data = $this->company_service->show_all_company_type($this->page,$this->limit);
          return $data;
        }

    }


    public function store(Request $request)
    {
       $data = $this->company_service->create_company_type($request->all());
       return $data;
    }

    public function show($id,Request $request)
    {
      if($request['page'])
      {
          $this->page = $request['page'];
          $this->limit = $request['limit'];
          $data = $this->company_service->show_company_type($id,$this->page,$this->limit);
          return $data;
      }

      else
      {
          $this->page = "";
          $this->limit = "";
          $data = $this->company_service->show_company_type($id,$this->page,$this->limit);
          return $data;
      }

    }


    public function update(Request $request, $id)
    {
        $data = $this->company_service->update_company_type($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->company_service->delete_company_type($id);
        return $data;
    }

}
