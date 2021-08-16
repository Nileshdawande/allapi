<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class lead_source_category_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_category($data)
   {
      return $this->performRequest("POST",$this->base_url."/category",$data);
   }

   public function show_all_category($page,$limit)
   {
      if(!empty($page))
      {
         return $this->performRequest("GET",$this->base_url."/category?page=".$page."&limit=".$limit);
      }
      else
      {
          return $this->performRequest("GET",$this->base_url."/category");
      }

   }

   public function show_category($id,$limit)
   {
      if(!empty($limit))
      {
         return $this->performRequest("GET",$this->base_url."/category/{$id}?limit=".$limit);
      }

      else
      {
          return $this->performRequest("GET",$this->base_url."/category/{$id}");
      }

   }

   public function update_category($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/category/{$id}",$data);
   }

   public function delete_category($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/category/{$id}");
   }

}

?>
