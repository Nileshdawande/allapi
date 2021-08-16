<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class report_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.report.base_uri');
   }

   public function get_report($fetch_type,$page,$limit)
   {
      return $this->performRequest("GET",$this->base_url."/report?page=".$page."&fetch_type=".$fetch_type."&limit=".$limit);
   }

   public function create_report($data)
   {
      return $this->performRequest("POST",$this->base_url."/report",$data);
   }



}

?>
