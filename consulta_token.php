<?php

/** ARQUIVO DE CONSULTA DE TOKEN **/
class ConsultaToken {

	private $token;
	private $url;
	private $client_id;
	private $client_secret;

	/**
	* metodo de inicialização
	**/
	public function __construct($tipo_ambiente, $client_secret, $client_id) {
		$this->client_secret 	= $client_secret;
		$this->client_id 		= $client_id;

		//setando o tipo do ambiente
		if($tipo_ambiente = 1) {
			//ambiente desenvolvimento
			$this->url = 'https://oauth.itau.com.br/identity/connect/token';
		}else if($tipo_ambiente = 2)  {
			//ambiente produção
			$this->url = "https://autorizador-boletos.itau.com.br";
		}else {
			return json_encode(false);
		}

		//consultando token
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
			    "content-type: application/x-www-form-urlencoded"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error # Token:" . $err;
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