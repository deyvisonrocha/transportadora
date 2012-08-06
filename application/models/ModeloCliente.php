<?php

class ModeloCliente extends ModeloAbstrato {

	protected $_name = "tb_cliente";
	protected $_primary = "id_cliente";

	protected $_dependentTables = array('ModeloFatura');

	public function inserir($dados) {
		// Pegando apenas os dados dos clientes
		$dadosCliente = array();
		$dadosCliente['razao_social'] 	= $dados['nome_sacado'];
		$dadosCliente['nome_fantasia'] 	= $dados['nome_sacado'];
		// Limpando formatação do CPF_CNPJ
		$cpfcnpjLimpo = str_replace('.', '', $dados['cnpj_cpf_sacado']);
		$cpfcnpjLimpo = str_replace('-', '', $cpfcnpjLimpo);
		$cpfcnpjLimpo = str_replace('/', '', $cpfcnpjLimpo);
		if (strlen($cpfcnpjLimpo) > 11) {
			$dadosCliente['tipo_cliente'] = "PJ";
		} else {
			$dadosCliente['tipo_cliente'] = "PF";
		}
		$dadosCliente['cpf_cnpj'] = $cpfcnpjLimpo;
		$dadosCliente['endereco'] = $dados['endereco_sacado'];
		$dadosCliente['cidade'] = $dados['municipio_sacado'];
		$dadosCliente['uf'] = $dados['estado_sacado'];
		// Limpando formatação do CEP
		$cepLimpo = str_replace('.', '', $dados['cep_sacado']);
		$cepLimpo = str_replace('-', '', $cepLimpo);
		$dadosCliente['cep'] = $cepLimpo;
		$dadosCliente['inscricao_estadual'] = $dados['inscricao_estadual_sacado'];
		$dadosCliente['data_cadastro'] = date('Y-m-d');
		return $this->insert($dadosCliente);
	}
}