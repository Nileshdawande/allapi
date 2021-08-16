<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\company_service;
class company_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $company_service;
    public function __construct(company_service $company_service)
    {
        $this->company_service = $company_service;
    }

    public function index(Request $request)
    {
        $data = $this->company_service->show_all_company();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->company_service->create_company($request->all());
        return $data;
    }

    public function show($company_id)
    {
        $data = $this->company_service->show_company($company_id);
        return $data;
    }


    public function update(Request $request, $company_id)
    {
        $data = $this->company_service->update_company($company_id,$request->all());
        return $data;        
    }

    public function destroy($company_id)
    {
        $data = $this->company_service->delete_company($company_id);
        return $data;        
    }

}
