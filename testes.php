<?php
/** REALIZANDO TESTES **/
include_once 'consulta_token.php';
include_once 'envia_remessa.php';

/*$token = new ConsultaToken();
$token = $token->getToken();

print_r($token);*/

//die;
$remessa = new EnviaRemessa();

//criando boleto para impressao
$boleto = [
	'tipo_ambiente' 							=> 1,
	'tipo_registro'								=> 1,
	'tipo_cobranca'								=> 1,
	'tipo_produto'								=> '00006',
	'subproduto'								=> '00008',
	'titulo_aceite'								=> 'N',
	'tipo_carteira_titulo'						=> '109',
	'nosso_numero'								=> '00221826',
	'digito_verificador_nosso_numero'			=> 8,
	//'codigo_barras'								=> '3419109008221031508134347167000047260000043831',
	'data_vencimento'							=> '2017-08-23',
	'valor_cobrado'								=> '00000000000043831',
	'seu_numero'								=> '221890',
	'especie'									=> '01',
	'data_emissao'								=> '2017-08-25',
	'data_limite_pagamento'						=> '2017-08-27',
	'tipo_pagamento'							=> 3,
	'indicador_pagamento_parcial'				=> false,
	//pagador
	'cpf_cnpj_pagador'							=> '09289311000197',
	'nome_pagador'								=> 'DRIMA COMERCIO DE BEBEDOUROS',//precisa reduzir o tamanho
	'logradouro_pagador'						=> 'RUA GEORG PTAK 267',
	'bairro_pagador'							=> 'JARDIM SAO',//precisa reduzir o tamanho
	'cidade_pagador'							=> 'SAO CARLOS',
	'uf_pagador'								=> 'SP',
	'cep_pagador'								=> '13570420',
	//moeda
	'codigo_moeda_cnab'							=> '9',
	//beneficiario
	'cpf_cnpj_beneficiario'						=> '08734539000127',
	'agencia_beneficiario'						=> '0534',
	'conta_beneficiario'						=> '0034536', 
	'digito_verificador_conta_beneficiario'		=> '7',
	//juros
	'tipo_juros'								=> 5,
	//multa
	'tipo_multa'								=> 3,
	//grupo desconto
	'tipo_desconto'								=> '0',
	//recebimento divergente
	'tipo_autorizacao_recebimento'				=> '3',
	'tipo_valor_percentual_recebimento'			=> 'V',
	'valor_minimo_recebimento'					=> '00000000000043831',
	'percentual_minimo_recebimento'				=> '',
	'valor_maximo_recebimento'					=> '00000000000043831',
	'percentual_maximo_recebimento'				=> ''
];


function objectToArrayF ($object) {
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



$remessa->addBoleto($boleto);
$result = $remessa->getBoletos();

$result = objectToArrayF($result);

//die(print_r($result));

$json_result = json_encode($result[0]);


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://gerador-boletos.itau.com.br/router-gateway-app/public/codigo_barras/registro",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $json_result,
  CURLOPT_HTTPHEADER => array(
    "accept: application/vnd.itau",
    "access_token: 690f6f394886f3f61e112d1c3d650408  ",
    "identificador: 08734949000127",
    "itau-chave: 9a6a013b-54df-49a5-bf99-f6235235f5775",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r(json_decode($response));
}