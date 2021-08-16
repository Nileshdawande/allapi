<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class candidatemaster_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.candidatemaster.base_uri');
   }

   public function create_candidate($data)
   {
      return $this->performRequest("POST",$this->base_url."/candidate-master",$data);
   }

   public function show_all_candidate()
   {
   		return $this->performRequest("GET",$this->base_url."/candidate-master");
   }

   public function show_candidate($id,$email_id)
   {
      if(!empty($email_id))
      {
        return $this->performRequest("GET",$this->base_url."/candidate-master/{$id}?email=".$email_id);
      }
      else
      {
        return $this->performRequest("GET",$this->base_url."/candidate-master/{$id}");
      }

   }

   public function update_candidate($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/candidate-master/{$id}",$data);
   }

   public function delete_candidate($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/candidate-master/{$id}");
   }

}

?>
