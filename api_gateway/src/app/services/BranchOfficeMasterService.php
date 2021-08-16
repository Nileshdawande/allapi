<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class BranchOfficeMasterService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_branchOfficeMaster($data)
   {
      return $this->performRequest("POST",$this->base_url."/branch-office-master",$data);
   }

   public function show_all_branchOfficeMaster($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/branch-office-master?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/branch-office-master");
      }

   }

   public function show_branchOfficeMaster($id)
   {
      return $this->performRequest("GET",$this->base_url."/branch-office-master/{$id}");
   }

   public function update_branchOfficeMaster($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/branch-office-master/{$id}",$data);
   }

   public function delete_branchOfficeMaster($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/branch-office-master/{$id}");
   }

}

?>
