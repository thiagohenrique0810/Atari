<?php

/** CLASS DE MOEDA **/

class Moeda {

	private $codigo_moeda_cnab;

	public function getCodigoMoedaCnab() {
		return $this->codigo_moeda_cnab;
	}

	public function setCodigoMoedaCnab($codigo_moeda_cnab) {
		$this->codigo_moeda_cnab = $codigo_moeda_cnab;
	}

}