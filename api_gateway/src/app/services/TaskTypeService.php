<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class TaskTypeService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.pms.base_uri');
   }

   public function create_taskType($data)
   {
      return $this->performRequest("POST",$this->base_url."/task-type-master",$data);
   }

   public function show_all_taskType()
   {
   		return $this->performRequest("GET",$this->base_url."/task-type-master");
   }

   public function show_taskType($id)
   {
      return $this->performRequest("GET",$this->base_url."/task-type-master/{$id}");
   }

   public function update_taskType($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/task-type-master/{$id}",$data);
   }

   public function delete_taskType($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/task-type-master/{$id}");
   }

}

?>
