<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class EmployeeAllocationSalaryDetailService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_employeeAllocationDetails($data)
   {
      return $this->performRequest("POST",$this->base_url."/emp-allocation-details",$data);
   }

   public function show_all_employeeAllocationDetails($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/emp-allocation-details?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/emp-allocation-details");
      }

   }

   public function show_employeeAllocationDetails($id)
   {
      return $this->performRequest("GET",$this->base_url."/emp-allocation-details/{$id}");
   }

   public function update_employeeAllocationDetails($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/emp-allocation-details/{$id}",$data);
   }

   public function delete_employeeAllocationDetails($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/emp-allocation-details/{$id}");
   }

}

?>
