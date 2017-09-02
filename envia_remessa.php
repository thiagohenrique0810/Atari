<?php
include_once 'boleto/boleto.php';
include_once 'consulta_token.php';
/**
* CLASSE DE REMESSA 
**/

class EnviaRemessa {

	private $remessa = [];
	private $token;
	private $tipo_ambiente;
	private $identificador;
	private $itau_chave;

	public function __construct($config) {
		//setando token
		$token = new ConsultaToken($config['tipo_ambiente'], $config['client_secret'], $config['client_id']);
		$token = $token->getToken();

		$this->token 			= $token->access_token;
		$this->tipo_ambiente 	= $config['tipo_ambiente'];// 1 - PARA TESTES 2 - PARA PRODUÇÃO
		$this->identificador 	= $config['identificador'];
		$this->itau_chave 		= $config['itau_chave'];
	}

	
	public function addBoleto($data = null) {
		if(!empty($data)) {
			//criando boleto
			$boleto = new Boleto();

			$boleto->setTipoAmbiente($this->tipo_ambiente);
			$boleto->setTipoRegistro($data['tipo_registro']);
			$boleto->setTipoCobranca($data['tipo_cobranca']);
			$boleto->setTipoProduto($data['tipo_produto']);
			$boleto->setSubProduto($data['subproduto']);
			$boleto->setTipoPagamento($data['tipo_pagamento']);

			//setando o beneficiario
			$beneficiario = new Beneficiario();
			$beneficiario->setCpfCnpjBeneficiario($data['cpf_cnpj_beneficiario']);
			$beneficiario->setAgenciaBeneficiario($data['agencia_beneficiario']);
			$beneficiario->setContaBeneficiario($data['conta_beneficiario']);
			$beneficiario->setDigitoVerificadorContaBeneficiario($data['digito_verificador_conta_beneficiario']);

			$boleto->setBenefiriario($beneficiario);

			$boleto->setTituloAceite($data['titulo_aceite']);

			//setando o pagador
			$pagador = new Pagador();
			$pagador->setCpfCnpjPagador($data['cpf_cnpj_pagador']);
			$pagador->setNomePagador($data['nome_pagador']);
			$pagador->setLogradouroPagador($data['logradouro_pagador']);
			$pagador->setBairroPagador($data['bairro_pagador']);
			$pagador->setCidadePagador($data['cidade_pagador']);
			$pagador->setUfPagador($data['uf_pagador']);
			$pagador->setCepPagador($data['cep_pagador']);
			
			$boleto->setPagador($pagador);

			$boleto->setTipoCarteiraTitulo($data['tipo_carteira_titulo']);

			//setando a moeda
			$moeda = new Moeda();
			$moeda->setCodigoMoedaCnab($data['codigo_moeda_cnab']);

			$boleto->setMoeda($moeda);
			
			$boleto->setNossoNumero($data['nosso_numero']);
			$boleto->setDigitoVerificadorNossoNumero($data['digito_verificador_nosso_numero']);
			$boleto->setCodigoBarras($data['codigo_barras']);
			$boleto->setDataVencimento($data['data_vencimento']);
			$boleto->setValorCobrado($data['valor_cobrado']);
			$boleto->setSeuNumero($data['seu_numero']);
			$boleto->setEspecie($data['especie']);
			$boleto->setDataEmissao($data['data_emissao']);
			$boleto->setDataLimitePagamento($data['data_limite_pagamento']);
			$boleto->setIndicadorPagamentoParcial($data['indicador_pagamento_parcial']);

			//setando o juros
			$juros = new Juros();
			$juros->setTipoJuros($data['tipo_juros']);
			
			$boleto->setJuros($juros);

			//setando o juros
			$multa = new Multa();
			$multa->setTipoMulta($data['tipo_multa']);
			
			$boleto->setMulta($multa);
			
			//setando o grupo de desconto
			$grupoDesconto = new GrupoDesconto();
			$grupoDesconto->setTipoDesconto($data['tipo_desconto']);

			$boleto->setGrupoDesconto($grupoDesconto);

			//setando os recebimentos divergente
			$recebimentoDivergente = new RecebimentoDivergente();
			$recebimentoDivergente->setTipoAutorizacaoRecebimento($data['tipo_autorizacao_recebimento']);
			$recebimentoDivergente->setTipoValorPercentualRecebimento($data['tipo_valor_percentual_recebimento']);
			$recebimentoDivergente->setValorMinimoRecebimento($data['valor_minimo_recebimento']);
			$recebimentoDivergente->setPercentualMinimoRecebimento($data['percentual_minimo_recebimento']);
			$recebimentoDivergente->setValorMaximoRecebimento($data['valor_maximo_recebimento']);
			$recebimentoDivergente->setPercentualMaximoRecebimento($data['percentual_maximo_recebimento']);

			$boleto->setRecebimentoDivergente($recebimentoDivergente);


			//adicionando boleto na remessa
			$this->remessa[] = $boleto;
			return true;
		}else {
			return false;
		}
	}

	public function getBoletos() {
		return $this->remessa;
	}

	public function enviar() {
		$curl = curl_init();

		function objectToArrayF($object) {
			if(!is_object($object) && !is_array($object)) {
		        return $object;
		    }

		    $object = (array) $object;
			$array = array();
			foreach ($object as $k => $v) {
			  $k = preg_match('/^\x00(?:.*?)\x00(.+)/', $k, $matches) ? $matches[1] : $k;
			  $array[$k] = $v;
			}

		    return array_map('objectToArrayF', $array);
		}

		//setando boletos
		$boletos = json_encode(objectToArrayF($this->getBoletos()[0]));//POR ENQUANTO ESTA ENVIANDO APENAS UM BOLETO POR VEZ NO ARRAY
		$header = array(
		    "accept: application/vnd.itau",
		    "access_token: " . $this->token,
		    "identificador: " . $this->identificador,
		    "itau-chave: " . $this->itau_chave,
		 );

		//die(print_r($header));
		//die(print_r($boletos));

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://gerador-boletos.itau.com.br/router-gateway-app/public/codigo_barras/registro",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $boletos,
		  CURLOPT_HTTPHEADER => $header,
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return "cURL Error #:" . $err;
		} else {
			return json_decode($response);
		}
	}

}