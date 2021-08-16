<?php

namespace App\Http\Controllers;
use App\Models\Contract;
use Illuminate\Http\Request;
class contract_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $all_data = [array("l_id"=>"","l_date"=>"","l_details"=>"")];
    private $data;
    private $formdata;
    private $l_id;
    private $l_date;
    private $l_details;
    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->response = Contract::paginate($request['limit']);
            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
                return response(array("notice"=>"Not found"),404)->header("Content-Type","application/json");
            }
        }

        else
        {
            $this->response = Contract::get();
            if(count($this->response) != 0)
            {
                return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }
            else
            {
                return response(array("notice"=>"Not found"),404)->header("Content-Type","application/json");
            }
        }

    }

    public function store(Request $request)
    {

        $this->response = Contract::where("contract_number",$request['contract_number'])->get();

        if(count($this->response) == 0)
        {
            Contract::create($request->all());
            return response(array("data"=>"Contract created"),201)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("notice"=>"Duplicate entry"),409)->header("Content-Type","application/json");
        }

    }

    public function show($contract_id,Request $request)
    {

       if($request['limit'])
       {
           $this->response = Contract::where("contract_number","LIKE",$contract_id."%")->paginate();
           if(count($this->response) != 0)
           {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
           }
           else
           {
               return response(array("notice"=>"Not found"),404)->header("Content-Type","application/json");
           }
       }

       else
       {
           $this->response = Contract::where("id",$contract_id)->get();
           if(count($this->response) != 0)
           {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
           }
           else
           {
               return response(array("notice"=>"Not found"),404)->header("Content-Type","application/json");
           }
       }


    }


    public function update(Request $request, $contract_id)
    {

        Contract::where("id",$contract_id)->update(array(

        'contract_number'=>$request['contract_number'],
        'company'=>$request['company'],
        'lead_id'=>$request['lead_id'],
        'requirement_category'=>$request['requirement_category'],
        'sales_employee'=>$request['sales_employee'],
        'contract_short_des'=>$request['contract_short_des'],
        'contract_type'=>$request['contract_type'],
        'contract_detailed'=>$request['contract_detailed']

        ));

    }

    public function destroy($contract_id)
    {

        $this->response = Contract::where("id",$contract_id)->delete();
        if($this->response)
        {
            return response(array("data"=>"Delete success"),200)->header("Content-Type","application/json");
        }
        else
        {
            return response(array("notice"=>"Delete failed"),404)->header("Content-Type","application/json");
        }

    }




}
