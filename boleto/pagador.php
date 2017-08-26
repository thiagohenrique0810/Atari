<?php

/** CLASSE DE PAGADOR **/
class Pagador {

	private $cpf_cnpj_pagador;
	private $nome_pagador;
	private $logradouro_pagador;
	private $bairro_pagador;
	private $cidade_pagador;
	private $uf_pagador;
	private $cep_pagador;


	public function getCpfCnpjPagador() {
		return $cpf_cnpj_pagador;
	}

	public function setCpfCnpjPagador($cpf_cnpj_pagador) {
		$this->cpf_cnpj_pagador = $cpf_cnpj_pagador;
	}

	public function getNomePagador() {
		return $this->nome_pagador;
	}

	public function setNomePagador($nome_pagador) {
		$this->nome_pagador = $nome_pagador;
	}

	public function getLogradouroPagador() {
		return $this->logradouro_pagador;
	}

	public function setLogradouroPagador($logradouro_pagador) {
		$this->logradouro_pagador = $logradouro_pagador;
	}

	public function getBairroPagador() {
		return $this->bairro_pagador;
	}

	public function setBairroPagador($bairro_pagador) {
		$this->bairro_pagador = $bairro_pagador;
	}

	public function getCidadePagador() {
		return $this->cidade_pagador;
	}

	public function setCidadePagador($cidade_pagador) {
		$this->cidade_pagador = $cidade_pagador;
	}

	public function getUfPagador() {
		return $uf_pagador;
	}

	public function setUfPagador($uf_pagador) {
		$this->uf_pagador = $uf_pagador;
	}

	public function getCepPagador() {
		return $cep_pagador;
	}

	public function setCepPagador($cep_pagador) {
		$this->cep_pagador = $cep_pagador;
	}

}