<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class lead_status_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_lead($data)
   {
      return $this->performRequest("POST",$this->base_url."/lead_status",$data);
   }

   public function show_all_lead($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/lead_status?page=".$page."&limit=".$limit);
      }

      else
      {
          return $this->performRequest("GET",$this->base_url."/lead_status");
      }

   }

   public function show_lead($lead_id,$limit)
   {
      if(!empty($limit))
      {
         return $this->performRequest("GET",$this->base_url."/lead_status/{$lead_id}?limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/lead_status/{$lead_id}");
      }

   }

   public function update_lead($lead_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/lead_status/{$lead_id}",$data);
   }

   public function delete_lead($lead_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/lead_status/{$lead_id}");
   }

}

?>
