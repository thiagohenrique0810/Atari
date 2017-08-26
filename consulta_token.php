<?php

/** ARQUIVO DE CONSULTA DE TOKEN **/
class ConsultaToken {

	private $token;
	private $url = 'https://oauth.itau.com.br/identity/connect/token';
	private $client_id = 'JeRNHwe_jq5h0';
	private $client_secret = '_CS1YIgcTt0YmETQKM277UsXZ97CUrBf6t6siSCB2Mau8rx-Yi2tvuFDfHn3vMTWv26V_JaSuUuZuYv8lw0a7g2';

	/**
	* metodo de inicialização
	**/
	public function __construct() {
		$this->getRequestToken();
	}

	public function getRequestToken() {
		try {
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => $this->url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "", 
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "scope=readonly&grant_type=client_credentials&client_id=" . $this->client_id . "&client_secret=" . $this->client_secret,
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "content-type: application/x-www-form-urlencoded",
			    "postman-token: 39c418fa-d307-cfd5-27ee-18bb69f0ea40"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $this->setToken(json_decode($response));
			}
		} catch (Exception $e) {
			
		}
	}

	public function getToken() {
		return $this->token;
	}

	public function setToken($token) {
		$this->token = $token;
	}

}