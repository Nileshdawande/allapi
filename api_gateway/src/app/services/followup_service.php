<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class followup_service
{
   use ConsumeExternalservice;

   public $base_url;
   private $fetch_type;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_followup($data)
   {
      return $this->performRequest("POST",$this->base_url."/followup",$data);
   }

   public function show_all_followup($data)
   {
      if(!empty($data))
      {
        $this->fetch_type = $data['fetch_type'];
        return $this->performRequest("GET",$this->base_url."/followup?fetch_type=".$this->fetch_type);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/followup");
      }
   }

   public function show_followup($followup_id)
   {
      return $this->performRequest("GET",$this->base_url."/followup/{$followup_id}");
   }

   public function update_followup($followup_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/followup/{$followup_id}",$data);
   }

   public function delete_followup($followup_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/followup/{$followup_id}");
   }

}

?>
