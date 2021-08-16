<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class branchMasterService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_branchMaster($data)
   {
      return $this->performRequest("POST",$this->base_url."/softlabs-branch-master",$data);
   }

   public function show_all_branchMaster($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/softlabs-branch-master?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/softlabs-branch-master");
      }

   }

   public function show_branchMaster($id)
   {
      return $this->performRequest("GET",$this->base_url."/softlabs-branch-master/{$id}");
   }

   public function update_branchMaster($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/softlabs-branch-master/{$id}",$data);
   }

   public function delete_branchMaster($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/softlabs-branch-master/{$id}");
   }

}

?>
