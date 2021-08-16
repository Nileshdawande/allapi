<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class OfferDetailService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.offerdetails.base_uri');
   }

   public function create_offerDetails($data)
   {
      return $this->performRequest("POST",$this->base_url."/offer-details",$data);
   }

   public function show_all_offerDetails($page,$limit)
   {
      if(!empty($page))
      {
          return $this->performRequest("GET",$this->base_url."/offer-details?page=".$page."&limit=".$limit);
      }

      else
      {
         return $this->performRequest("GET",$this->base_url."/offer-details");
      }

   }

   public function show_offerDetails($id)
   {
      return $this->performRequest("GET",$this->base_url."/offer-details/{$id}");
   }

   public function update_offerDetails($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/offer-details/{$id}",$data);
   }

   public function delete_offerDetails($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/offer-details/{$id}");
   }

}

?>
