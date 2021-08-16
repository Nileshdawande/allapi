<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class dipartment_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_dipartment($data)
   {
      return $this->performRequest("POST",$this->base_url."/dipartment",$data);
   }

   public function show_all_dipartment()
   {
      return $this->performRequest("GET",$this->base_url."/dipartment");
   }

   public function show_dipartment($dipartment_id)
   {
      return $this->performRequest("GET",$this->base_url."/dipartment/{$dipartment_id}");
   }

   public function update_dipartment($dipartment_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/dipartment/{$dipartment_id}",$data);
   }

   public function delete_dipartment($dipartment_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/dipartment/{$dipartment_id}");
   }

}

?>
