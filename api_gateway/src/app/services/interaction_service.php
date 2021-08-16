<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class interaction_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_interaction($data)
   {
      return $this->performRequest("POST",$this->base_url."/interaction",$data);
   }

   public function show_all_interaction($page,$limit)
   {
      if(!empty($page))
      {
         return $this->performRequest("GET",$this->base_url."/interaction?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/interaction");
      }

   }

   public function show_interaction($interaction_id,$limit)
   {
      if(!empty($limit))
      {
         return $this->performRequest("GET",$this->base_url."/interaction/{$interaction_id}?limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/interaction/{$interaction_id}");
      }

   }

   public function update_interaction($interaction_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/interaction/{$interaction_id}",$data);
   }

   public function delete_interaction($interaction_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/interaction/{$interaction_id}");
   }

}

?>
