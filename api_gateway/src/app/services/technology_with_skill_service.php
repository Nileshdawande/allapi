<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class technology_with_skill_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.skillmaster.base_uri');
   }

   public function create_technology($data)
   {
      return $this->performRequest("POST",$this->base_url."/technology-skill",$data);
   }

   public function show_all_technology()
   {
   		return $this->performRequest("GET",$this->base_url."/technology-skill");
   }

   public function show_technology($technology_id)
   {
      return $this->performRequest("GET",$this->base_url."/technology-skill/{$technology_id}");
   }

   public function update_technology($technology_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/technology-skill/{$technology_id}",$data);
   }

   public function delete_technology($technology_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/technology-skill/{$technology_id}");
   }

}

?>