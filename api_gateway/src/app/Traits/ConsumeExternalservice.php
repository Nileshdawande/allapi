<?php

namespace App\Traits;
use GuzzleHttp\Client;
trait ConsumeExternalservice
{
	public function performRequest($method,$requestUrl,$formParams=[],$headers=[])
	{
		/*$client = new Client([
		'base_uri'=>$this->baseUri
		]);

		$client = new Client();
		$response = $client->request($method,$requestUrl,["form_params"=>$formParams,"headers"=>$headers]);

		return $response->getBody()->getContents();
		*/

		$client = new Client();
		$response = $client->request($method,$requestUrl,["form_params"=>$formParams,"headers"=>$headers]);

		return $response->getBody()->getContents();
	}
}

?>