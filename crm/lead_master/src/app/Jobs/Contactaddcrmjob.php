<?php

namespace App\Jobs;
use App\Models\Lead;
class Contactaddcrmjob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public $lead_data;
    public $l_data;
    public $l_id;
    public $update_type;
    public $contact_id;
    public $company_id;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $this->lead_data = Lead::orderBy("id","DESC")->limit(1)->get();
        foreach ($this->lead_data as $l_data) 
        {
            $this->l_id = $l_data->id;
        }

        $this->update_type = $this->data['update_type'];
        if($this->update_type == "contact_id")
        {
            $this->contact_id = $this->data['id'];
            Lead::where("id",$this->l_id)->update(array("contact_id"=>$this->contact_id));
        }

        if($this->update_type == "company_id")
        {
            $this->company_id = $this->data['id'];
            Lead::where("id",$this->l_id)->update(array("company_id"=>$this->company_id));
        }        
        
 


    }
}