<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class InterviewDetails_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.interview.base_uri');
   }

   public function create_interviewDetails($data)
   {
      return $this->performRequest("POST",$this->base_url."/interview-details",$data);
   }

   public function show_all_interviewDetails($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/interview-details?page=".$page."&limit=".$limit);
      }

      else
      {
          return $this->performRequest("GET",$this->base_url."/interview-details");
      }

   }

   public function show_interviewDetails($id)
   {
      return $this->performRequest("GET",$this->base_url."/interview-details/{$id}");
   }

   public function update_interviewDetails($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/interview-details/{$id}",$data);
   }

   public function delete_interviewDetails($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/interview-details/{$id}");
   }

}

?>
