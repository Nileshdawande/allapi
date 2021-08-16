<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class recruitment_request_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
         $this->base_url = config('services.recruitment.base_uri');
   }

   public function create_recruitment($data)
   {
      return $this->performRequest("POST",$this->base_url."/recruitment_request",$data);
   }

   public function show_all_recruitment()
   {
         return $this->performRequest("GET",$this->base_url."/recruitment_request");
   }

   public function show_recruitment($rec_id)
   {
      return $this->performRequest("GET",$this->base_url."/recruitment_request/{$rec_id}");
   }

   public function update_recruitment($rec_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/recruitment_request/{$rec_id}",$data);
   }

   public function delete_recruitment($rec_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/recruitment_request/{$rec_id}");
   }

}

?>