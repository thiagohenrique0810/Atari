<?php
/** REALIZANDO TESTES **/
include_once 'consulta_token.php';
include_once 'envia_remessa.php';

$token = new ConsultaToken();
$token = $token->getToken();

//print_r($token);

//die;
$remessa = new EnviaRemessa();

//criando boleto para impressao
$boleto = [
	'tipo_ambiente' 							=> '2',
	'tipo_registro'								=> '1',
	'tipo_cobranca'								=> '1',
	'tipo_produto'								=> '00006',
	'subproduto'								=> '00008',
	'titulo_aceite'								=> 'N',
	'tipo_carteira_titulo'						=> '140',
	'nosso_numero'								=> '221031',
	'digito_verificador_nosso_numero'			=> '5',
	'codigo_barras'								=> '3419109008221031508134347167000047260000043831',
	'data_vencimento'							=> '2017-08-23',
	'valor_cobrado'								=> '00000000000043831',
	'seu_numero'								=> '221031',
	'especie'									=> '01',
	'data_emissao'								=> '2017-08-23',
	'data_limite_pagamento'						=> '2017-08-23',
	'tipo_pagamento'							=> '1',
	'indicador_pagamento_parcial'				=> false,
	//pagador
	'cpf_cnpj_pagador'							=> '00041918806837',
	'nome_pagador'								=> 'MAYCONN DOUGLAS GOMES',
	'logradouro_pagador'						=> 'RUA QUARENTA E OITO',
	'bairro_pagador'							=> 'ESPINHEIRO',
	'cidade_pagador'							=> 'RECIFE',
	'uf_pagador'								=> 'PE',
	'cep_pagador'								=> '52020060',
	//moeda
	'codigo_moeda_cnab'							=> '9',
	//beneficiario
	'cpf_cnpj_beneficiario'						=> '08734949000127',
	'agencia_beneficiario'						=> '0123',
	'conta_beneficiario'						=> '031234',
	'digito_verificador_conta_beneficiario'		=> '7',
	//juros
	'tipo_juros'								=> '5',
	//multa
	'tipo_multa'								=> '3',
	//grupo desconto
	'tipo_desconto'								=> '0',
];

$remessa->addBoleto($boleto);
$result = $remessa->getBoletos();
$result = (array) $result;

echo json_encode($result);