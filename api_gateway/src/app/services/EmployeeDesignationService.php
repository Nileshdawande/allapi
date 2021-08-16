<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class EmployeeDesignationService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_employeeDesignation($data)
   {
      return $this->performRequest("POST",$this->base_url."/employee-designation",$data);
   }

   public function show_all_employeeDesignation($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/employee-designation?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/employee-designation");
      }

   }

   public function show_employeeDesignation($id)
   {
      return $this->performRequest("GET",$this->base_url."/employee-designation/{$id}");
   }

   public function update_employeeDesignation($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/employee-designation/{$id}",$data);
   }

   public function delete_employeeDesignation($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/employee-designation/{$id}");
   }

}

?>
