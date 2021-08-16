<?php
namespace App\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use App\Models\Lead;
use Illuminate\Http\Request;
session_start();
class ContactaddedListener implements ShouldQueue
{
    public $data;
    public $lead_data;
    public $l_id;
    public function __construct()
    {
    	// $this->data = $data;
    }
        
    public function handle($event)
    {
        // Log::info('Order created on estore:' . json_encode($event));
        $this->lead_data = Lead::orderBy("id","DESC")->limit(1)->get();
        foreach ($this->lead_data as $l_data) 
        {
            $this->l_id = $l_data->id;
        }


        foreach($event as $get_data)
        {
            if($get_data['update_type'] == "contact_id")
            {
                Lead::where("id",$this->l_id)->update(array("contact_id"=>$get_data['id']));
            }

            if($get_data['update_type'] == "company_id")
            {
                Lead::where("id",$this->l_id)->update(array("company_id"=>$get_data['id']));
            }

        }
        
        
    }
}

?>