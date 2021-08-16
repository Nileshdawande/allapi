<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class requirement_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_requirement($data)
   {
      return $this->performRequest("POST",$this->base_url."/requirement",$data);
   }

   public function show_all_requirement($page,$limit)
   {
      if(!empty($page))
      {
         return $this->performRequest("GET",$this->base_url."/requirement?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/requirement");
      }

   }

   public function show_requirement($req_id,$limit)
   {
      if(!empty($limit))
      {
        return $this->performRequest("GET",$this->base_url."/requirement/{$req_id}?limit=".$limit);
      }
      else
      {
        return $this->performRequest("GET",$this->base_url."/requirement/{$req_id}");
      }

   }

   public function update_requirement($req_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/requirement/{$req_id}",$data);
   }

   public function delete_requirement($req_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/requirement/{$req_id}");
   }

}

?>
