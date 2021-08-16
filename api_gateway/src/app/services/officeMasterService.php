<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class officeMasterService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_officeMaster($data)
   {
      return $this->performRequest("POST",$this->base_url."/softlabs-office-master",$data);
   }

   public function show_all_officeMaster($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/softlabs-office-master?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/softlabs-office-master");
      }

   }

   public function show_officeMaster($id)
   {
      return $this->performRequest("GET",$this->base_url."/softlabs-office-master/{$id}");
   }

   public function update_officeMaster($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/softlabs-office-master/{$id}",$data);
   }

   public function delete_officeMaster($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/softlabs-office-master/{$id}");
   }

}

?>
