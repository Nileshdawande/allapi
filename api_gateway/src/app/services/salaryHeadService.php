<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class salaryHeadService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_salaryHead($data)
   {
      return $this->performRequest("POST",$this->base_url."/salary-head",$data);
   }

   public function show_all_salaryHead($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/salary-head?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/salary-head");
      }

   }

   public function show_salaryHead($id)
   {
      return $this->performRequest("GET",$this->base_url."/salary-head/{$id}");
   }

   public function update_salaryHead($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/salary-head/{$id}",$data);
   }

   public function delete_salaryHead($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/salary-head/{$id}");
   }

}

?>
