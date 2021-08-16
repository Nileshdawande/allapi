<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class interviewTypes_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.interview.base_uri');
   }

   public function create_interviewType($data)
   {
      return $this->performRequest("POST",$this->base_url."/interview-type",$data);
   }

   public function show_all_interviewType($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/interview-type?page=".$page."&limit=".$limit);
      }

      else
      {
          return $this->performRequest("GET",$this->base_url."/interview-type");
      }

   }

   public function show_interviewType($id,$page,$limit)
   {
      if(!empty($limit))
      {
         return $this->performRequest("GET",$this->base_url."/interview-type/{$id}?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/interview-type/{$id}");
      }

   }

   public function update_interviewType($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/interview-type/{$id}",$data);
   }

   public function delete_interviewType($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/interview-type/{$id}");
   }

}

?>
