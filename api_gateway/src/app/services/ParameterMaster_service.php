<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class ParameterMaster_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.interview.base_uri');
   }

   public function create_parametermaster($data)
   {
      return $this->performRequest("POST",$this->base_url."/parameter",$data);
   }

   public function show_all_parametermaster($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/parameter?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/parameter");
      }

   }

   public function show_parametermaster($id)
   {
      return $this->performRequest("GET",$this->base_url."/parameter/{$id}");
   }

   public function update_parametermaster($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/parameter/{$id}",$data);
   }

   public function delete_parametermaster($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/parameter/{$id}");
   }

}

?>
