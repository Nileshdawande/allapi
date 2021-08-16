<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class contract_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_contract($data)
   {
      return $this->performRequest("POST",$this->base_url."/contract",$data);
   }

   public function show_all_contract($page,$limit)
   {
      if(!empty($page))
      {
         return $this->performRequest("GET",$this->base_url."/contract?page=".$page."&limit=".$limit);
      }
      else
      {
         return $this->performRequest("GET",$this->base_url."/contract");
      }

   }

   public function show_contract($contract_id,$limit)
   {
      if(!empty($limit))
      {
         return $this->performRequest("GET",$this->base_url."/contract/{$contract_id}?limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/contract/{$contract_id}");
      }

   }

   public function update_contract($contract_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/contract/{$contract_id}",$data);
   }

   public function delete_contract($contract_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/contract/{$contract_id}");
   }

}

?>
