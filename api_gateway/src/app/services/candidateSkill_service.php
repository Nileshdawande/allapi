<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class candidateSkill_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.candidatemaster.base_uri');
   }

   public function create_candidate($data)
   {
      return $this->performRequest("POST",$this->base_url."/candidate-skill",$data);
   }

   public function show_all_candidate($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/candidate-skill?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/candidate-skill");
      }

   }

   public function show_candidate($id)
   {
      return $this->performRequest("GET",$this->base_url."/candidate-skill/{$id}");
   }

   public function update_candidate($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/candidate-skill/{$id}",$data);
   }

   public function delete_candidate($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/candidate-skill/{$id}");
   }

}

?>
