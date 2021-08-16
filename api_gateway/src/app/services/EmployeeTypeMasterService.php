<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class EmployeeTypeMasterService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_employeeTypeMaster($data)
   {
      return $this->performRequest("POST",$this->base_url."/employee-type-master",$data);
   }

   public function show_all_employeeTypeMaster($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/employee-type-master?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/employee-type-master");
      }

   }

   public function show_employeeTypeMaster($id)
   {
      return $this->performRequest("GET",$this->base_url."/employee-type-master/{$id}");
   }

   public function update_employeeTypeMaster($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/employee-type-master/{$id}",$data);
   }

   public function delete_employeeTypeMaster($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/employee-type-master/{$id}");
   }

}

?>
