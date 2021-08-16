<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class EmpAnnualMasterService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_empAnnualMaster($data)
   {
      return $this->performRequest("POST",$this->base_url."/emp-annual-leave-master",$data);
   }

   public function show_all_empAnnualMaster($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/emp-annual-leave-master?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/emp-annual-leave-master");
      }

   }

   public function show_empAnnualMaster($id)
   {
      return $this->performRequest("GET",$this->base_url."/emp-annual-leave-master/{$id}");
   }

   public function update_empAnnualMaster($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/emp-annual-leave-master/{$id}",$data);
   }

   public function delete_empAnnualMaster($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/emp-annual-leave-master/{$id}");
   }

}

?>
