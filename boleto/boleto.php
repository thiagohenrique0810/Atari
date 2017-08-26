<?php

include_once 'beneficiario.php';
include_once 'grupoDesconto.php';
include_once 'juros.php';
include_once 'multa.php';
include_once 'pagador.php';
include_once 'moeda.php';
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

	public function getTipoAmbiente() {
		return $this->tipo_produto;
	}

	public function setTipoAmbiente($tipo_produto) {
		$this->tipo_produto = $tipo_produto;
		return $this;
	}

	public function getTipoRegistro() {
		return $this->tipo_registro;
	}

	public function setTipoRegistro($tipo_registro) {
		$this->tipo_registro = $tipo_registro;
		return $this;
	}

	public function getTipoCobranca() {
		return $this->tipo_cobranca;
	}

	public function setTipoCobranca($tipo_cobranca) {
		$this->tipo_cobranca = $tipo_cobranca;
		return $this;
	}

	public function getTipoProduto() {
		return $this->tipo_produto;
	}

	public function setTipoProduto($tipo_produto) {
		$this->tipo_produto = $tipo_produto;
		return $this;
	}

	public function getSubProduto() {
		return $this->subproduto;
	}

	public function setSubProduto($subproduto) {
		$this->subproduto = $subproduto;
		return $this;
	}

	public function getBenefiriario() {
		return $this->beneficiario;
	}

	public function setBenefiriario(Beneficiario $beneficiario = null) {
		$this->beneficiario = $beneficiario;
		return $this;
	}

	public function getTituloAceite() {
		return $this->titulo_aceite;
	}

	public function setTituloAceite($titulo_aceite) {
		$this->setTituloAceite = $titulo_aceite;
		return $this;
	}

	public function getPagador() {
		return $this->pagador;
	}

	public function setPagador(Pagador $pagador = null) {
		$this->pagador = $pagador;
		return $this;
	}

	public function getTipoCarteiraTitulo() {
		return $this->tipo_carteira_titulo;
	}

	public function setTipoCarteiraTitulo($tipo_carteira_titulo) {
		$this->setTipoCarteiraTitulo = $tipo_carteira_titulo;
		return $this;
	}

	public function getMoeda() {
		return $this->moeda;
	}

	public function setMoeda(Moeda $moeda = null) {
		$this->moeda = $moeda;
		return $this;
	}

	public function getNossoNumero() {
		return $this->nosso_numero;
	}

	public function setNossoNumero($nosso_numero) {
		$this->nosso_numero = $nosso_numero;
		return $this;
	}
	
	public function getDigitoVerificadorNossoNumero() {
		return $this->digito_verificador_nosso_numero;
	}

	public function setDigitoVerificadorNossoNumero($digito_verificador_nosso_numero) {
		$this->digito_verificador_nosso_numero = $digito_verificador_nosso_numero;
		return $this;
	}

	public function getCodigoBarras() {
		return $this->codigo_barras;
	}

	public function setCodigoBarras($codigo_barras) {
		$this->codigo_barras = $codigo_barras;
		return $this;
	}

	public function getDataVencimento()  {
		return $data_vencimento;
	}

	public function setDataVencimento($data_vencimento)  {
		$this->data_vencimento = $data_vencimento;
		return $this;
	}

	public function getValorCobrado() {
		return $this->valor_cobrado;
	}

	public function setValorCobrado($valor_cobrado) {
		$this->valor_cobrado = $valor_cobrado;
		return $this;
	}	

	public function getSeuNumero() {
		return $this->seu_numero;
	}

	public function setSeuNumero($seu_numero) {
		$this->seu_numero = $seu_numero;
		return $this;
	}

	public function getEspecie() {
		return $this->especie;
	}

	public function setEspecie($especie) {
		$this->especie = $especie;
		return $this;
	}

	public function getDataEmissao() {
		return $this->data_emissao;
	}

	public function setDataEmissao($data_emissao) {
		$this->data_emissao = $data_emissao;
		return $this;
	}

	public function getDataLimitePagamento() {
		return $this->getDataLimitePagamento;
	}

	public function setDataLimitePagamento($setDataLimitePagamento) {
		$this->setDataLimitePagamento = $data_limite_pagamento;
		return $this;
	}

	public function getTipoPagamento() {
		return $this->tipo_pagamento;
	}

	public function setTipoPagamento($tipo_pagamento) {
		$this->tipo_pagamento = $tipo_pagamento;
		return $this;
	}

	public function getIndicadorPagamentoParcial() {
		return $this->indicador_pagamento_parcial;
	}

	public function setIndicadorPagamentoParcial($indicador_pagamento_parcial) {
		$this->indicador_pagamento_parcial = $indicador_pagamento_parcial;
		return $this;
	}

	public function getGrupoDesconto() {
		return $this->getGrupoDesconto;
	}

	public function setGrupoDesconto(GrupoDesconto $setGrupoDesconto = null) {
		$this->setGrupoDesconto = $setGrupoDesconto;
		return $this;
	}

	public function getJuros() {
		return $this->juros;
	}

	public function setJuros(Juros $juros = null) {
		$this->juros = $juros;
		return $this;
	}

	public function getMulta() {
		return $this->multa;
	}

	public function setMulta(Multa $multa = null) {
		$this->multa = $multa;
		return $this;
	}


}