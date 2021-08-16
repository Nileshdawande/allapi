<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class CommentService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.pms.base_uri');
   }

   public function create_Comment($data)
   {
      return $this->performRequest("POST",$this->base_url."/comment",$data);
   }

   public function show_all_Comment()
   {
   		return $this->performRequest("GET",$this->base_url."/comment");
   }

   public function show_Comment($id,$fetch_type)
   {
      if(!empty($fetch_type))
      {
        return $this->performRequest("GET",$this->base_url."/comment/{$id}?fetch_type=".$fetch_type);
      }

      else
      {
        return $this->performRequest("GET",$this->base_url."/comment/{$id}");
      }

   }

   public function update_Comment($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/comment/{$id}",$data);
   }

   public function delete_Comment($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/comment/{$id}");
   }

}

?>
