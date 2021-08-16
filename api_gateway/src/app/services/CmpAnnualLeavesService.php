<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class CmpAnnualLeavesService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.branchmaster.base_uri');
   }

   public function create_cmpAnnualMaster($data)
   {
      return $this->performRequest("POST",$this->base_url."/cmp-leave-master",$data);
   }

   public function show_all_cmpAnnualMaster($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/cmp-leave-master?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/cmp-leave-master");
      }

   }

   public function show_cmpAnnualMaster($id)
   {
      return $this->performRequest("GET",$this->base_url."/cmp-leave-master/{$id}");
   }

   public function update_cmpAnnualMaster($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/cmp-leave-master/{$id}",$data);
   }

   public function delete_cmpAnnualMaster($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/cmp-leave-master/{$id}");
   }

}

?>
