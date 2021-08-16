<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Jobs\Contactaddcrmjob;
use App\Jobs\Contactaddedujob;
use App\Jobs\Contactaddsalaryjob;
class contact_api extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    public function index(Request $request)
    { 
       $this->response = Contact::get();
       return response(array("data"=>$this->response),200)->header("Content-type","application/json");
    }

    public function store(Request $request)
    {

       $this->response = Contact::create($request->all());
       $this->response = Contact::orderBy("id","DESC")->limit(1)->get('id');
       foreach ($this->response as $data) 
       {

            if($request['contact_type'] == "employee_contact")
            {
               $data = array("update_type"=>"contact_id","id"=>$data->id); 
               dispatch(new Contactaddedujob($data))->onQueue('contacteduqueue');
            }

            if($request['contact_type'] == "lead_contact")
            {
                $data = array("update_type"=>"contact_id","id"=>$data->id);
                dispatch(new Contactaddcrmjob($data))->onQueue('contactqueue');
            }

       }
       
       return response(array("data"=>"Success"),201)->header("Content-type","application/json");
    }

    public function show($contact_id)
    {
        $this->response = Contact::where("id",$contact_id)->get();
        if(count($this->response) != 0)
        {
             return response(array("data"=>$this->response),200)->header("Content-type","application/json");
        }
        else
        {
             return response(array("notice"=>"Not Found"),404)->header("Content-type","application/json");
        }

    }


    public function update(Request $request, $contact_id)
    {
        $this->response = Contact::where("id",$contact_id)->update(array(

        'firstname'=>$request['firstname'],
        'lastname'=>$request['lastname'],
        'designation_id'=>$request['designation_id'],
        'department_id'=>$request['department_id'],
        'address_one'=>$request['address_one'],
        'address_two'=>$request['address_two'],
        'state'=>$request['state'],
        'city'=>$request['city'],
        'country'=>$request['country'],
        'pincode'=>$request['pincode'],
        'email'=>$request['email'],
        'website'=>$request['website'],
        'contact_one'=>$request['contact_one'],
        'contact_two'=>$request['contact_two'],           

        ));

        if($this->response)
        {
            return response(array("data"=>"Update Success"),200)->header("Content-type","application/json");
        }

        else
        {
            return response(array("notice"=>"Update failed"),404)->header("Content-type","application/json");
        }
    }

    public function destroy($contact_id)
    {
        $this->response = Contact::where("id",$contact_id)->delete();

        if($this->response)
        {
            return response(array("data"=>"Delete Success"),200)->header("Content-type","application/json");
        }

        else
        {
            return response(array("notice"=>"Delete failed"),404)->header("Content-type","application/json");
        }
    }




}
