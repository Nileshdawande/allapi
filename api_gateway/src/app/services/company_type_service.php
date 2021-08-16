<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class company_type_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_company_type($data)
   {
      return $this->performRequest("POST",$this->base_url."/cmptype",$data);
   }

   public function show_all_company_type($page,$limit)
   {
      if(!empty($limit))
      {
        return $this->performRequest("GET",$this->base_url."/cmptype?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/cmptype");
      }

   }

   public function show_company_type($id,$page,$limit)
   {
      if(empty($page))
      {
         return $this->performRequest("GET",$this->base_url."/cmptype/{$id}");
      }

      else
      {
          return $this->performRequest("GET",$this->base_url."/cmptype/{$id}?page=".$page."&limit=".$limit);
      }

   }

   public function update_company_type($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/cmptype/{$id}",$data);
   }

   public function delete_company_type($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/cmptype/{$id}");
   }

}

?>
