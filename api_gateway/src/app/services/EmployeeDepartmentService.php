<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class EmployeeDepartmentService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_employeeDepartment($data)
   {
      return $this->performRequest("POST",$this->base_url."/employee-department",$data);
   }

   public function show_all_employeeDepartment($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/employee-department?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/employee-department");
      }

   }

   public function show_employeeDepartment($id)
   {
      return $this->performRequest("GET",$this->base_url."/employee-department/{$id}");
   }

   public function update_employeeDepartment($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/employee-department/{$id}",$data);
   }

   public function delete_employeeDepartment($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/employee-department/{$id}");
   }

}

?>
