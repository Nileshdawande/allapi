<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\lead_source_category_service;
class leadSourceCategoryApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $category_service;
    private $page;
    private $limit;
    public function __construct(lead_source_category_service $category_service)
    {
        $this->category_service = $category_service;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->category_service->show_all_category($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->category_service->show_all_category($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
       $data = $this->category_service->create_category($request->all());
       return $data;
    }

    public function show($id,Request $request)
    {
        if(!empty($request['limit']))
        {
            $this->limit = $request['limit'];
            $data = $this->category_service->show_category($id,$this->limit);
            return $data;
        }

        else
        {
            $this->limit = "";
            $data = $this->category_service->show_category($id,$this->limit);
            return $data;
        }

    }


    public function update(Request $request, $id)
    {
        $data = $this->category_service->update_category($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->category_service->delete_category($id);
        return $data;
    }

}
