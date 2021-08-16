<?php

namespace App\services;
use App\Traits\ConsumeExternalservice;
use GuzzleHttp\Client;
class empsalary_service
{
   use ConsumeExternalservice;

   public $base_url;
   public function __construct()
   {
   		$this->base_url = config('services.empeducation.base_uri');
   }

   public function create_employee_sal($data)
   {
      return $this->performRequest("POST",$this->base_url."/employee-salary",$data);
   }

   public function show_all_employee_sal()
   {
   		return $this->performRequest("GET",$this->base_url."/employee-salary");
   }

   public function show_employee_sal($sal_id)
   {
      return $this->performRequest("GET",$this->base_url."/employee-salary/{$sal_id}");
   }

   public function update_employee_sal($sal_id,$data)
   {
      return $this->performRequest("PUT",$this->base_url."/employee-salary/{$sal_id}",$data);
   }

   public function delete_employee_sal($sal_id)
   {
      return $this->performRequest("DELETE",$this->base_url."/employee-salary/{$sal_id}");
   }

}

?>