<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class LeaveTypeService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_leaveType($data)
   {
      return $this->performRequest("POST",$this->base_url."/emp-leave-master",$data);
   }

   public function show_all_leaveType($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/emp-leave-master?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/emp-leave-master");
      }

   }

   public function show_leaveType($id)
   {
      return $this->performRequest("GET",$this->base_url."/emp-leave-master/{$id}");
   }

   public function update_leaveType($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/emp-leave-master/{$id}",$data);
   }

   public function delete_leaveType($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/emp-leave-master/{$id}");
   }

}

?>
