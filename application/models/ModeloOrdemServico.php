<?php

class ModeloOrdemServico extends ModeloAbstrato {

	protected $_name = "tb_ordem_servico";
	protected $_primary = "id_ordem_servico";

	public function inserir($dados) {

		$modeloCliente = new ModeloCliente();
		// Verificando se o id_cliente_origem existe
		if ($dados['id_cliente_origem'] == "") {
			$dadosCliente = array();
			$dadosCliente['razao_social'] = $dados['origem_razao_social'];
			$dadosCliente['cpf_cnpj'] = $dados['origem_cpf_cnpj'];
			$dadosCliente['endereco'] = $dados['origem_endereco'];
			$dadosCliente['numero'] = $dados['origem_numero'];
			$dadosCliente['complemento'] = $dados['origem_complemento'];
			$dadosCliente['bairro'] = $dados['origem_bairro'];
			$dadosCliente['cidade'] = $dados['origem_cidade'];
			$dadosCliente['uf'] = $dados['origem_uf'];
			$dadosCliente['contato'] = $dados['origem_contato'];
			$dadosCliente['telefone1'] = $dados['origem_fone'];
			// Inserir a Origem
			$id_cliente_origem = $modeloCliente->insert($dadosCliente);
			$dados['id_cliente_origem'] = $id_cliente_origem;
		}

		if ($dados['id_cliente_destino'] == "" || $dados['origem_cpf_cnpj'] == $dados['destino_cpf_cnpj']) {
			$dadosCliente = array();
			$dadosCliente['razao_social'] = $dados['destino_razao_social'];
			$dadosCliente['cpf_cnpj'] = $dados['destino_cpf_cnpj'];
			$dadosCliente['endereco'] = $dados['destino_endereco'];
			$dadosCliente['numero'] = $dados['destino_numero'];
			$dadosCliente['complemento'] = $dados['destino_complemento'];
			$dadosCliente['bairro'] = $dados['destino_bairro'];
			$dadosCliente['cidade'] = $dados['destino_cidade'];
			$dadosCliente['uf'] = $dados['destino_uf'];
			$dadosCliente['contato'] = $dados['destino_contato'];
			$dadosCliente['telefone1'] = $dados['destino_fone'];
			// Inserir a Origem
			$id_cliente_destino = $modeloCliente->insert($dadosCliente);
			$dados['id_cliente_destino'] = $id_cliente_destino;
		}

		// Setando valores
		$dados['valor_frete'] = Funcoes::formataValorBanco($dados['valor_frete']);
		$dados['valor_seguro'] = Funcoes::formataValorBanco($dados['valor_seguro']);
		$dados['valor_imposto'] = Funcoes::formataValorBanco($dados['valor_imposto']);
		$dados['valor_total'] = Funcoes::formataValorBanco($dados['valor_total']);
		// Formatando as datas
		$dados['data_execucao'] = $dados['data_execuacao'] == "" ? date('Y-m-d') : Funcoes::formataDataBanco($dados['data_execuacao']);
		return $this->insert($dados);
	}

	public function alterar($dados) {
		$id_ordem_servico = $dados['id_ordem_servico'];
		unset($dados['id_ordem_servico']);
		// Setando valores
		$dados['valor_frete'] = Funcoes::formataValorBanco($dados['valor_frete']);
		$dados['valor_seguro'] = Funcoes::formataValorBanco($dados['valor_seguro']);
		$dados['valor_imposto'] = Funcoes::formataValorBanco($dados['valor_imposto']);
		$dados['valor_total'] = Funcoes::formataValorBanco($dados['valor_total']);
		// Formatando as datas
		$dados['data_execucao'] = $dados['data_execuacao'] == "" ? date('Y-m-d') : Funcoes::formataDataBanco($dados['data_execuacao']);
		return $this->update($dados, 'id_ordem_servico = '.$id_ordem_servico);	
	}

	public function getById($id) {
		$db = $this->_db;
		$select = $db->select();
		$select ->from(array('os' => $this->_name))
				->joinLeft(array('c' => 'tb_cliente'), 'os.id_cliente_origem = c.id_cliente', array('razao_social'))
				->where('os.id_ordem_servico = ?', $id);
		return $db->fetchRow($select);
	}

	public function listar() {
		$db = $this->_db;
		$select = $db->select();
		$select ->from(array('tbos' => $this->_name), array('id_ordem_servico', 'data_execucao as emissao','titulo_servico','valor_total'))
				->joinLeft(array('tbc' => 'tb_cliente'), 'tbos.id_cliente_origem = tbc.id_cliente', array('razao_social'))
				->group('id_ordem_servico')
				->order('id_ordem_servico DESC');
		return $db->fetchAll($select);

	}
}