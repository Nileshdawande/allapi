<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class EmployeeMasterService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_employeeMaster($data)
   {
      return $this->performRequest("POST",$this->base_url."/emp-master",$data);
   }

   public function show_all_employeeMaster($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/emp-master?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/emp-master");
      }

   }

   public function show_employeeMaster($id)
   {
      return $this->performRequest("GET",$this->base_url."/emp-master/{$id}");
   }

   public function update_employeeMaster($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/emp-master/{$id}",$data);
   }

   public function delete_employeeMaster($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/emp-master/{$id}");
   }

}

?>
