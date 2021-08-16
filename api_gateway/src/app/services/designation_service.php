<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class designation_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_designation($data)
   {
      return $this->performRequest("POST",$this->base_url."/designation",$data);
   }

   public function show_all_designation()
   {
      return $this->performRequest("GET",$this->base_url."/designation");
   }

   public function show_designation($designation_id)
   {
      return $this->performRequest("GET",$this->base_url."/designation/{$designation_id}");
   }

   public function update_designation($designation_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/designation/{$designation_id}",$data);
   }

   public function delete_designation($designation_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/designation/{$designation_id}");
   }

}

?>
