<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class leads_service
{
   use ConsumeExternalservice;

   public $base_url;
   private $fetch_type;
   public function __construct()
   {
   		$this->base_url = config('services.lead.base_uri');
   }

   public function create_lead($data)
   {
      return $this->performRequest("POST",$this->base_url."/lead",$data);
   }

   public function show_all_lead($request)
   {
      if(!empty($request))
      {
         $this->fetch_type = $request['fetch_type'];
         return $this->performRequest("GET",$this->base_url."/lead?fetch_type=".$this->fetch_type);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/lead");
      }

   }

   public function show_lead($lead_id)
   {
      return $this->performRequest("GET",$this->base_url."/lead/{$lead_id}");
   }

   public function update_lead($lead_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/lead/{$lead_id}",$data);
   }

   public function delete_lead($lead_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/lead/{$lead_id}");
   }

}

?>
