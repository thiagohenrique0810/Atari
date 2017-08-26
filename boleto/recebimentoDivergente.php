<?php

class RecebimentoDivergente {

	private $tipo_autorizacao_recebimento;
	private $tipo_valor_percentual_recebimento;
	private $valor_minimo_recebimento;
	private $percentual_minimo_recebimento;
	private $valor_maximo_recebimento;
	private $percentual_maximo_recebimento;



	public function getTipoAutorizacaoRecebimento() {
		return $this->tipo_autorizacao_recebimento;
	}

	public function setTipoAutorizacaoRecebimento($tipo_autorizacao_recebimento) {
		$this->tipo_autorizacao_recebimento = $tipo_autorizacao_recebimento;
	}

	public function getTipoValorPercentualRecebimento() {
		return $this->tipo_valor_percentual_recebimento;
	}

	public function setTipoValorPercentualRecebimento($tipo_valor_percentual_recebimento) {
		$this->tipo_valor_percentual_recebimento = $tipo_valor_percentual_recebimento;
	}

	public function getValorMinimoRecebimento() {
		return $this->valor_minimo_recebimento;
	}

	public function setValorMinimoRecebimento($valor_minimo_recebimento) {
		$this->valor_minimo_recebimento = $valor_minimo_recebimento;
	}

	public function getPercentualMinimoRecebimento() {
		return $this->percentual_minimo_recebimento;
	}

	public function setPercentualMinimoRecebimento($percentual_minimo_recebimento) {
		$this->percentual_minimo_recebimento = $percentual_minimo_recebimento;
	}

	public function getValorMaximoRecebimento() {
		return $this->valor_maximo_recebimento;
	}

	public function setValorMaximoRecebimento($valor_maximo_recebimento) {
		$this->valor_maximo_recebimento = $valor_maximo_recebimento;
	}

	public function getPercentualMaximoRecebimento() {
		return $this->percentual_maximo_recebimento;
	}

	public function setPercentualMaximoRecebimento($percentual_maximo_recebimento) {
		$this->percentual_maximo_recebimento = $percentual_maximo_recebimento;
	}

}