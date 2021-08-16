<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class CandidateInterviewSchedule_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.interview.base_uri');
   }

   public function create_candidateInterviewSchedule($data)
   {
      return $this->performRequest("POST",$this->base_url."/candidate-interview-schedule",$data);
   }

   public function show_all_candidateInterviewSchedule($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/candidate-interview-schedule?page=".$page."&limit=".$limit);
      }

      else
      {
          return $this->performRequest("GET",$this->base_url."/candidate-interview-schedule");
      }

   }

   public function show_candidateInterviewSchedule($id)
   {
      return $this->performRequest("GET",$this->base_url."/candidate-interview-schedule/{$id}");
   }

   public function update_candidateInterviewSchedule($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/candidate-interview-schedule/{$id}",$data);
   }

   public function delete_candidateInterviewSchedule($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/candidate-interview-schedule/{$id}");
   }

}

?>
