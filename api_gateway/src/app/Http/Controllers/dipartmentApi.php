<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\dipartment_service;
class dipartmentApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $dipartment_service;
    private $limit;
    private $page;
    public function __construct(dipartment_service $dipartment_service)
    {
        $this->dipartment_service = $dipartment_service;
    }

    public function index(Request $request)
    {
        $data = $this->dipartment_service->show_all_dipartment();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->dipartment_service->create_dipartment($request->all());
        return $data;
    }

    public function show($dipartment_id,Request $request)
    {
        $data = $this->dipartment_service->show_dipartment($dipartment_id);
        return $data;
    }


    public function update(Request $request, $dipartment_id)
    {
        $data = $this->dipartment_service->update_dipartment($dipartment_id,$request->all());
        return $data;
    }

    public function destroy($dipartment_id)
    {
        $data = $this->dipartment_service->delete_dipartment($dipartment_id);
        return $data;
    }

}
