<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class UserService
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.users.base_uri');
   }

   public function create_User($data)
   {
      return $this->performRequest("POST",$this->base_url."/user",$data);
   }

   public function show_all_User()
   {
      return $this->performRequest("GET",$this->base_url."/user");
   }

   public function show_User($id,$email,$pass,$url)
   {
      if($id == "login")
      {
         return $this->performRequest("GET",$this->base_url."/user/{$id}?email_id=".$email."&password=".$pass."&url=".$url);
      }

      if($id == "dashboardlogin")
      {
         return $this->performRequest("GET",$this->base_url."/user/{$id}?email_id=".$email."&url=".$url);
      }

      else
      {
        return $this->performRequest("GET",$this->base_url."/user/{$id}");
      }

   }

   public function update_User($id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/user/{$id}",$data);
   }

   public function delete_User($id)
   {
      return $this->performRequest("DELETE",$this->base_url."/user/{$id}");
   }

}

?>
