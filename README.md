# Atari
API DE TRANSMISSÃO AUTOMÁTICA DE REMESSA NO PADRÃO CNAB DE BOLETOS DO BANCO ITAÚ

Para que a API funcione perfeitamente em seu server, é necessário que as extenções do seu php.ini para SSL estejam habilitadas, para isso você pode descomenta-las.
```INI

#Antes
;extension=php_soap.dll
;extension=php_openssl.dll
;extension=php_curl.dll

#Depois
extension=php_soap.dll
extension=php_openssl.dll
extension=php_curl.dll
```

 ###Exemplo de teste
```PHP
<?php

/** REALIZANDO TESTES **/
include_once 'envia_remessa.php';

$config = [
	'tipo_ambiente' => 1,//tipo de ambiente: 1- TESTES | 2 - PRODUÇÃO
	'identificador' => '08734949000000',//CNPJ DA EMPRESA
	'itau_chave' 	=> '9a6a013b-werf-49a5-bf99-f674761f5775',
	'client_id'		=> 'JeRNHwe_jqrwer',
	'client_secret'	=> '_CS1YIgcTt0YmETQKM277UsXZ97CUrBf6t6siSCB20000rx-Yi2tvuFDfHn3vMTWv26V_JaSuUuZuYv8lw0a7g2'
];

$remessa = new EnviaRemessa($config);


//criando boleto para impressao
$boleto = [
	'tipo_registro'								=> 1,
	'tipo_cobranca'								=> 1,
	'tipo_produto'								=> '00006',
	'subproduto'								=> '00008',
	'titulo_aceite'								=> 'N',
	'tipo_carteira_titulo'						=> '109',
	'nosso_numero'								=> '00222059',
	'digito_verificador_nosso_numero'			=> 5,
	//'codigo_barras'								=> '3419109008221031508134347167000047260000043831',
	'data_vencimento'							=> '2017-09-05',
	'valor_cobrado'								=> '00000000000057561',
	'seu_numero'								=> '222059',
	'especie'									=> '01',
	'data_emissao'								=> '2017-09-02',
	'data_limite_pagamento'						=> '2017-09-05',
	'tipo_pagamento'							=> 3,
	'indicador_pagamento_parcial'				=> false,
	//pagador
	'cpf_cnpj_pagador'							=> '00004191669000',
	'nome_pagador'								=> 'MAYCON MACIEL DE ALENCAR',//precisa reduzir o tamanho
	'logradouro_pagador'						=> 'R TENENTE MARTINS 521',
	'bairro_pagador'							=> 'BOA VISTA',//precisa reduzir o tamanho
	'cidade_pagador'							=> 'TIMON',
	'uf_pagador'								=> 'MA',
	'cep_pagador'								=> '65631470',
	//moeda
	'codigo_moeda_cnab'							=> '9',
	//beneficiario
	'cpf_cnpj_beneficiario'						=> '08734949000000',
	'agencia_beneficiario'						=> '0800',
	'conta_beneficiario'						=> '0034700', 
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
	'valor_minimo_recebimento'					=> '00000000000057561',
	'percentual_minimo_recebimento'				=> '',
	'valor_maximo_recebimento'					=> '00000000000057561',
	'percentual_maximo_recebimento'				=> ''
];

//adicioando boleto
$remessa->addBoleto($boleto);

$result = $remessa->enviar();

die(print_r($result));



```
