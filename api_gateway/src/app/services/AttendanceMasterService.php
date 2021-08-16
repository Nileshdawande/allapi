<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class AttendanceMasterService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.attendancemaster.base_uri');
   }

   public function create_AttendanceMaster($data)
   {
      return $this->performRequest("POST",$this->base_url."/attendance_details",$data);
   }

   public function show_all_AttendanceMaster($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/attendance_details?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/attendance_details");
      }

   }

   public function show_AttendanceMaster($id)
   {
      return $this->performRequest("GET",$this->base_url."/attendance_details/{$id}");
   }

   public function update_AttendanceMaster($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/attendance_details/{$id}",$data);
   }

   public function delete_AttendanceMaster($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/attendance_details/{$id}");
   }

}

?>
