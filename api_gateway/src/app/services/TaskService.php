<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class TaskService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.pms.base_uri');
   }

   public function create_task($data)
   {
      return $this->performRequest("POST",$this->base_url."/pms-task",$data);
   }

   public function show_all_task()
   {
   		return $this->performRequest("GET",$this->base_url."/pms-task");
   }

   public function show_task($id,$fetch_type)
   {
      if(!empty($fetch_type))
      {
        return $this->performRequest("GET",$this->base_url."/pms-task/{$id}?fetch_type=".$fetch_type);
      }

      else
      {
        return $this->performRequest("GET",$this->base_url."/pms-task/{$id}");
      }

   }

   public function update_task($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/pms-task/{$id}",$data);
   }

   public function delete_task($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/pms-task/{$id}");
   }

}

?>
