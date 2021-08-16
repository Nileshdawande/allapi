<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class EmployeeLeaveService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.attendancemaster.base_uri');
   }

   public function create_EmployeeLeaveMaster($data)
   {
      return $this->performRequest("POST",$this->base_url."/emp-leaves",$data);
   }

   public function show_all_EmployeeLeaveMaster($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/emp-leaves?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/emp-leaves");
      }

   }

   public function show_EmployeeLeaveMaster($id)
   {
      return $this->performRequest("GET",$this->base_url."/emp-leaves/{$id}");
   }

   public function update_EmployeeLeaveMaster($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/emp-leaves/{$id}",$data);
   }

   public function delete_EmployeeLeaveMaster($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/emp-leaves/{$id}");
   }

}

?>
