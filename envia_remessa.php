<?php
include_once 'boleto/boleto.php';
/**
* CLASSE DE REMESSA 
**/

class EnviaRemessa {

	private $remessa = [];

	
	public function addBoleto($data = null) {
		if(!empty($data)) {
			//criando boleto
			$boleto = new Boleto();


			$boleto->setTipoAmbiente($data['tipo_ambiente']);
			$boleto->setTipoRegistro($data['tipo_registro']);
			$boleto->setTipoCobranca($data['tipo_cobranca']);
			$boleto->setTipoProduto($data['tipo_produto']);
			$boleto->setSubProduto($data['subproduto']);

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
			
			//setando o grupo de desconto
			$grupoDesconto = new GrupoDesconto();
			$grupoDesconto->setTipoDesconto($data['tipo_desconto']);

			$boleto->setGrupoDesconto($grupoDesconto);


			//adicionando boleto na remessa
			$this->remessa[] = $boleto;
		}else {
			return false;
		}
	}

	public function getBoletos() {
		return $this->remessa;
	}

	public function envia() {

	}

	private static function toArray($object) {
    $reflectionClass = new \ReflectionClass($object);

    $properties = $reflectionClass->getProperties();

    $array = [];
    foreach ($properties as $property) {
        $property->setAccessible(true);
        $value = $property->getValue($object);
        if (is_object($value)) {
            $array[$property->getName()] = self::toArray($value);
        } else {
            $array[$property->getName()] = $value;
        }
    }
    return $array;
}

}