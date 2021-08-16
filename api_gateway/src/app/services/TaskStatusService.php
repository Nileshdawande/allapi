<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class TaskStatusService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.pms.base_uri');
   }

   public function create_taskStatus($data)
   {
      return $this->performRequest("POST",$this->base_url."/task-status-master",$data);
   }

   public function show_all_taskStatus()
   {
   		return $this->performRequest("GET",$this->base_url."/task-status-master");
   }

   public function show_taskStatus($id)
   {
      return $this->performRequest("GET",$this->base_url."/task-status-master/{$id}");
   }

   public function update_taskStatus($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/task-status-master/{$id}",$data);
   }

   public function delete_taskStatus($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/task-status-master/{$id}");
   }

}

?>
