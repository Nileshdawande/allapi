<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class project_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.designation.base_uri');
   }

   public function create_project($data)
   {
      return $this->performRequest("POST",$this->base_url."/project",$data);
   }

   public function show_all_project()
   {
      return $this->performRequest("GET",$this->base_url."/project");
   }

   public function show_project($project_id,$fatch_type)
   {
      if(!empty($fatch_type))
      {
         return $this->performRequest("GET",$this->base_url."/project/{$project_id}?fetch_type=".$fatch_type);
      }


      else
      {
         return $this->performRequest("GET",$this->base_url."/project/{$project_id}");
      }

   }

   public function update_project($project_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/project/{$project_id}",$data);
   }

   public function delete_project($project_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/project/{$project_id}");
   }

}

?>
