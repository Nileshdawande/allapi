<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class EmployeeSalaryService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.attendancemaster.base_uri');
   }

   public function create_EmployeeSalary($data)
   {
      return $this->performRequest("POST",$this->base_url."/emp-salary",$data);
   }

   public function show_all_EmployeeSalary($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/emp-salary?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/emp-salary");
      }

   }

   public function show_EmployeeSalary($id)
   {
      return $this->performRequest("GET",$this->base_url."/emp-salary/{$id}");
   }

   public function update_EmployeeSalary($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/emp-salary/{$id}",$data);
   }

   public function delete_EmployeeSalary($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/emp-salary/{$id}");
   }

}

?>
