<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class contact_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.contact.base_uri');
   }

   public function create_contact($data)
   {
      return $this->performRequest("POST",$this->base_url."/contact",$data);
   }

   public function show_all_contact()
   {
   		return $this->performRequest("GET",$this->base_url."/contact");
   }

   public function show_contact($contact_id)
   {
      return $this->performRequest("GET",$this->base_url."/contact/{$contact_id}");
   }

   public function update_contact($contact_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/contact/{$contact_id}",$data);
   }

   public function delete_contact($contact_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/contact/{$contact_id}");
   }

}

?>