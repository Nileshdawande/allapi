<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class company_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.company.base_uri');
   }

   public function create_company($data)
   {
      return $this->performRequest("POST",$this->base_url."/company",$data);
   }

   public function show_all_company()
   {
   		return $this->performRequest("GET",$this->base_url."/company");
   }

   public function show_company($company_id)
   {
      return $this->performRequest("GET",$this->base_url."/company/{$company_id}");
   }

   public function update_company($company_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/company/{$company_id}",$data);
   }

   public function delete_company($company_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/company/{$company_id}");
   }

}

?>