<?php

include_once 'beneficiario.php';
include_once 'grupoDesconto.php';
include_once 'juros.php';
include_once 'multa.php';
include_once 'pagador.php';
include_once 'moeda.php';
include_once 'recebimentoDivergente.php';
/**
* CLASSE DO BOLETO
**/

class boleto {

	private $tipo_ambiente;
	private $tipo_registro;
	private $tipo_cobranca;
	private $tipo_produto;
	private $subproduto;
	private $beneficiario;
	private $titulo_aceite;
	private $pagador;
	private $tipo_carteira_titulo;
	private $moeda;
	private $nosso_numero;
	private $digito_verificador_nosso_numero;
	private $codigo_barras;
	private $data_vencimento;
	private $valor_cobrado;
	private $seu_numero;
	private $especie;
	private $data_emissao;
	private $data_limite_pagamento;
	private $tipo_pagamento;
	private $indicador_pagamento_parcial;
	private $juros;
	private $multa;
	private $grupo_desconto;
	private $recebimento_divergente;

	public function getTipoAmbiente() {
		return $this->tipo_ambiente;
	}

	public function setTipoAmbiente($tipo_ambiente) {
		$this->tipo_ambiente = $tipo_ambiente;
	}

	public function getTipoRegistro() {
		return $this->tipo_registro;
	}

	public function setTipoRegistro($tipo_registro) {
		$this->tipo_registro = $tipo_registro;
	}

	public function getTipoCobranca() {
		return $this->tipo_cobranca;
	}

	public function setTipoCobranca($tipo_cobranca) {
		$this->tipo_cobranca = $tipo_cobranca;
	}

	public function getTipoProduto() {
		return $this->tipo_produto;
	}

	public function setTipoProduto($tipo_produto) {
		$this->tipo_produto = $tipo_produto;
	}

	public function getSubProduto() {
		return $this->subproduto;
	}

	public function setSubProduto($subproduto) {
		$this->subproduto = $subproduto;
	}

	public function getBenefiriario() {
		return $this->beneficiario;
	}

	public function setBenefiriario($beneficiario) {
		$this->beneficiario = $beneficiario;
	}

	public function getTituloAceite() {
		return $this->titulo_aceite;
	}

	public function setTituloAceite($titulo_aceite) {
		$this->titulo_aceite = $titulo_aceite;
	}

	public function getPagador() {
		return $this->pagador;
	}

	public function setPagador( $pagador ) {
		$this->pagador = $pagador;
	}

	public function getTipoCarteiraTitulo() {
		return $this->tipo_carteira_titulo;
	}

	public function setTipoCarteiraTitulo($tipo_carteira_titulo) {
		$this->tipo_carteira_titulo = $tipo_carteira_titulo;
	}

	public function getMoeda() {
		return $this->moeda;
	}

	public function setMoeda( $moeda ) {
		$this->moeda = $moeda;
	}

	public function getNossoNumero() {
		return $this->nosso_numero;
	}

	public function setNossoNumero($nosso_numero) {
		$this->nosso_numero = $nosso_numero;
	}
	
	public function getDigitoVerificadorNossoNumero() {
		return $this->digito_verificador_nosso_numero;
	}

	public function setDigitoVerificadorNossoNumero($digito_verificador_nosso_numero) {
		$this->digito_verificador_nosso_numero = $digito_verificador_nosso_numero;
	}

	public function getCodigoBarras() {
		return $this->codigo_barras;
	}

	public function setCodigoBarras($codigo_barras) {
		$this->codigo_barras = $codigo_barras;
	}

	public function getDataVencimento()  {
		return $this->data_vencimento;
	}

	public function setDataVencimento($data_vencimento)  {
		$this->data_vencimento = $data_vencimento;
	}

	public function getValorCobrado() {
		return $this->valor_cobrado;
	}

	public function setValorCobrado($valor_cobrado) {
		$this->valor_cobrado = $valor_cobrado;
	}	

	public function getSeuNumero() {
		return $this->seu_numero;
	}

	public function setSeuNumero($seu_numero) {
		$this->seu_numero = $seu_numero;
	}

	public function getEspecie() {
		return $this->especie;
	}

	public function setEspecie($especie) {
		$this->especie = $especie;
	}

	public function getDataEmissao() {
		return $this->data_emissao;
	}

	public function setDataEmissao($data_emissao) {
		$this->data_emissao = $data_emissao;
	}

	public function getDataLimitePagamento() {
		return $this->data_limite_pagamento;
	}

	public function setDataLimitePagamento($data_limite_pagamento) {
		$this->data_limite_pagamento = $data_limite_pagamento;
	}

	public function getTipoPagamento() {
		return $this->tipo_pagamento;
	}

	public function setTipoPagamento($tipo_pagamento) {
		$this->tipo_pagamento = $tipo_pagamento;
	}

	public function getIndicadorPagamentoParcial() {
		return $this->indicador_pagamento_parcial;
	}

	public function setIndicadorPagamentoParcial($indicador_pagamento_parcial) {
		$this->indicador_pagamento_parcial = $indicador_pagamento_parcial;
	}

	public function getGrupoDesconto() {
		return $this->grupo_desconto;
	}

	public function setGrupoDesconto($grupo_desconto ) {
		$this->grupo_desconto = $grupo_desconto;
	}

	public function getJuros() {
		return $this->juros;
	}

	public function setJuros($juros ) {
		$this->juros = $juros;
	}

	public function getMulta() {
		return $this->multa;
	}

	public function setMulta($multa) {
		$this->multa = $multa;
	}

	public function getRecebimentoDivergente() {
		return $this->recebimento_divergente;
	}

	public function setRecebimentoDivergente($recebimento_divergente) {
		$this->recebimento_divergente = $recebimento_divergente;
	}


}