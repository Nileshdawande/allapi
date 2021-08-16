<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\technology_with_skill_service;
class technology_with_skill_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $technology_with_skill_service;
    public function __construct(technology_with_skill_service $technology_with_skill_service)
    {
        $this->technology_with_skill_service = $technology_with_skill_service;
    }

    public function index(Request $request)
    {
        $data = $this->technology_with_skill_service->show_all_technology();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->technology_with_skill_service->create_technology($request->all());   
        return $data;
    }

    public function show($technology_id)
    {
        $data = $this->technology_with_skill_service->show_technology($technology_id);
        return $data;
    }


    public function update(Request $request, $technology_id)
    {
        $data = $this->technology_with_skill_service->update_technology($technology_id,$request->all());
        return $data;        
    }

    public function destroy($technology_id)
    {
        $data = $this->technology_with_skill_service->delete_technology($technology_id);
        return $data;        
    }

}
