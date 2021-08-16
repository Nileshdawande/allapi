<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class empeducation_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.empeducation.base_uri');
   }

   public function create_employee($data)
   {
      return $this->performRequest("POST",$this->base_url."/employee-education",$data);
   }

   public function show_all_employee()
   {
   		return $this->performRequest("GET",$this->base_url."/employee-education");
   }

   public function show_employee($edu_id)
   {
      return $this->performRequest("GET",$this->base_url."/employee-education/{$edu_id}");
   }

   public function update_employee($edu_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/employee-education/{$edu_id}",$data);
   }

   public function delete_employee($edu_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/employee-education/{$edu_id}");
   }

}

?>