<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class CandidateInterviewResult_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.interview.base_uri');
   }

   public function create_candidateInterviewResult($data)
   {
      return $this->performRequest("POST",$this->base_url."/candidate-interview-result",$data);
   }

   public function show_all_candidateInterviewResult($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/candidate-interview-result?page=".$page."&limit=".$limit);
      }

      else
      {
          return $this->performRequest("GET",$this->base_url."/candidate-interview-result");
      }

   }

   public function show_candidateInterviewResult($id)
   {
      return $this->performRequest("GET",$this->base_url."/candidate-interview-result/{$id}");
   }

   public function update_candidateInterviewResult($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/candidate-interview-result/{$id}",$data);
   }

   public function delete_candidateInterviewResult($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/candidate-interview-result/{$id}");
   }

}

?>
