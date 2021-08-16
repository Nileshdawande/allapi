<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\contact_service;
class contact_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $contact_service;
    public function __construct(contact_service $contact_service)
    {
        $this->contact_service = $contact_service;
    }

    public function index(Request $request)
    {
        $data = $this->contact_service->show_all_contact();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->contact_service->create_contact($request->all());   
        return $data;
    }

    public function show($contact_id)
    {
        $data = $this->contact_service->show_contact($contact_id);
        return $data;
    }


    public function update(Request $request, $contact_id)
    {
        $data = $this->contact_service->update_contact($contact_id,$request->all());
        return $data;        
    }

    public function destroy($contact_id)
    {
        $data = $this->contact_service->delete_contact($contact_id);
        return $data;        
    }

}
