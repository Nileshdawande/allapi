<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class EmployeeAllocationService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_employeeAllocation($data)
   {
      return $this->performRequest("POST",$this->base_url."/emp-allocation",$data);
   }

   public function show_all_employeeAllocation($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/emp-allocation?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/emp-allocation");
      }

   }

   public function show_employeeAllocation($id)
   {
      return $this->performRequest("GET",$this->base_url."/emp-allocation/{$id}");
   }

   public function update_employeeAllocation($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/emp-allocation/{$id}",$data);
   }

   public function delete_employeeAllocation($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/emp-allocation/{$id}");
   }

}

?>
