<?php

namespace App\Http\Controllers;
use App\Models\Company_master;
use Illuminate\Http\Request;
use App\Jobs\Contactaddcrmjob;
use App\Jobs\Contactaddedujob;
class company_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    public function index(Request $request)
    {
        $this->response = Company_master::get();
        if(count($this->response) != 0)
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }
        else
        {
            return response(array("data"=>$this->response),404)->header("Content-Type","application/json");
        }
    }


    public function store(Request $request)
    {

      $this->response = Company_master::create($request->all());
      $this->response = Company_master::orderBy("id","DESC")->limit(1)->get('id');

      if($request->input("system_type") == "crm_company")
      {

      foreach ($this->response as $data)
       {
            $data = array("update_type"=>"company_id","id"=>$data->id);
            // event(new \App\Events\Contactadded($data));

            dispatch(new Contactaddcrmjob($data))->onQueue('contactqueue');
       }

        return response(array("data"=>"Success"),201)->header("Content-Type","application/json");
      }


      if($request->input("system_type") == "hrms_company")  
      {

      foreach ($this->response as $data)
       {
            $data = array("update_type"=>"company_id","id"=>$data->id);
            // event(new \App\Events\Contactadded($data));

            dispatch(new Contactaddedujob($data))->onQueue('contacteduqueue');
       }

        return response(array("data"=>"Success"),201)->header("Content-Type","application/json");
      }



    }


    public function show($company_id)
    {

        $this->response = Company_master::where("id",$company_id)->get();
        if(count($this->response) != 0)
        {
            return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }
        else
        {
            return response(array("data"=>$this->response),404)->header("Content-Type","application/json");
        }

    }


    public function update(Request $request, $company_id)
    {
       if($request['update_type'] == "contact")
       {
            $this->response = Company_master::where("id",$company_id)->update(array(
                "contact_id"=>$request['contact_id']
            ));

       if($this->response)
       {
            return response(array("data"=>"Update Sucess"),200)->header("Content-Type","application/json");
       }
       else
       {
            return response(array("data"=>"Update Failed"),404)->header("Content-Type","application/json");
       }

       }

       // $this->response = Company_master::where("id",$company_id)->update(array(
       //  'company_name'=>$request['company_name'],
       //  'address_first'=>$request['address_first'],
       //  'address_second'=>$request['address_second'],
       //  'city'=>$request['city'],
       //  'state'=>$request['state'],
       //  'country'=>$request['country'],
       //  'pincode'=>$request['pincode'],
       //  'email'=>$request['email'],
       //  'website'=>$request['website'],
       //  'contact_id'=>$request['contact_id'],
       //  'contact_number_1'=>$request['contact_number_1'],
       //  'contact_number_2'=>$request['contact_number_2'],
       //  'parant_company_id'=>$request['parant_company_id']

       //  ));

       // if($this->response)
       // {
       //      return response(array("data"=>"Update Sucess"),200)->header("Content-Type","application/json");
       // }
       // else
       // {
       //      return response(array("data"=>"Update Failed"),404)->header("Content-Type","application/json");
       // }

    }

    public function destroy($company_id)
    {
        $this->response = Company_master::where("id",$company_id)->delete();
        if($this->response)
        {
            return response(array("data"=>"Delete Success"),200)->header("Content-Type","application/json");
        }
        else
        {
            return response(array("data"=>"Delete Failed"),404)->header("Content-Type","application/json");
        }
    }




}
