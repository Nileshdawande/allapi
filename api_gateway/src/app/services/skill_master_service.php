<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class skill_master_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.skillmaster.base_uri');
   }

   public function create_skill($data)
   {
      return $this->performRequest("POST",$this->base_url."/skill-masters",$data);
   }

   public function show_all_skill($page,$limit)
   {
      if(!empty($page))
      {
         return $this->performRequest("GET",$this->base_url."/skill-masters?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/skill-masters");
      }

   }

   public function show_skill($skill_id,$limit)
   {
      if(!empty($limit))
      {
         return $this->performRequest("GET",$this->base_url."/skill-masters/{$skill_id}?limit=".$limit);
      }

      else
      {
        return $this->performRequest("GET",$this->base_url."/skill-masters/{$skill_id}");

      }

   }

   public function update_skill($skill_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/skill-masters/{$skill_id}",$data);
   }

   public function delete_skill($skill_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/skill-masters/{$skill_id}");
   }

}

?>
