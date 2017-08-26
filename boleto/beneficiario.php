<?php

class Beneficiario {
	
	private $cpf_cnpj_beneficiario;
	private $agencia_beneficiario;
	private $conta_beneficiario;
	private $digito_verificador_conta_beneficiario;

	public function getCpfCnpjBeneficiario() {
		return $this->cpf_cnpj_beneficiario;
	}

	public function setCpfCnpjBeneficiario($cpf_cnpj_beneficiario) {
		$this->cpf_cnpj_beneficiario = $cpf_cnpj_beneficiario;
	}

	public function getAgenciaBeneficiario() {
		return $this->agencia_beneficiario;
	}

	public function setAgenciaBeneficiario($agencia_beneficiario) {
		$this->agencia_beneficiario = $agencia_beneficiario;
	}

	public function getContaBeneficiario() {
		return $this->conta_beneficiario;
	}

	public function setContaBeneficiario($conta_beneficiario) {
		$this->conta_beneficiario = $conta_beneficiario;
	}

	public function getDigitoVerificadorContaBeneficiario() {
		return $this->digito_verificador_conta_beneficiario;
	}

	public function setDigitoVerificadorContaBeneficiario($digito_verificador_conta_beneficiario) {
		$this->digito_verificador_conta_beneficiario = $digito_verificador_conta_beneficiario;
	}
}