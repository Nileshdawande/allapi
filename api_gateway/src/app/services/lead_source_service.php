<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class lead_source_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_lead_source($data)
   {
      return $this->performRequest("POST",$this->base_url."/lead_source",$data);
   }

   public function show_all_lead_source($num,$limit)
   {
      if(!empty($num))
      {
          return $this->performRequest("GET",$this->base_url."/lead_source?page=".$num."&limit=".$limit);
      }
   		else
      {
         return $this->performRequest("GET",$this->base_url."/lead_source");
      }
   }

   public function show_lead_source($lead_id,$limit)
   {
      if(empty($limit))
      {
         return $this->performRequest("GET",$this->base_url."/lead_source/{$lead_id}");
      }
      else
      {
         return $this->performRequest("GET",$this->base_url."/lead_source/{$lead_id}/?limit=".$limit);
      }

   }

   public function update_lead_source($lead_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/lead_source/{$lead_id}",$data);
   }

   public function delete_lead_source($lead_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/lead_source/{$lead_id}");
   }

}

?>
