<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class interviewSchedule_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.interview.base_uri');
   }

   public function create_interviewSchedule($data)
   {
      return $this->performRequest("POST",$this->base_url."/interview-schedule",$data);
   }

   public function show_all_interviewSchedule($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/interview-schedule?page=".$page."&limit=".$limit);
      }

      else
      {
          return $this->performRequest("GET",$this->base_url."/interview-schedule");
      }

   }

   public function show_interviewSchedule($id)
   {
      return $this->performRequest("GET",$this->base_url."/interview-schedule/{$id}");
   }

   public function update_interviewSchedule($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/interview-schedule/{$id}",$data);
   }

   public function delete_interviewSchedule($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/interview-schedule/{$id}");
   }

}

?>
