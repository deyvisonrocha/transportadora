<?php

class ModeloOrdemServico extends ModeloAbstrato {

	protected $_name = "tb_ordem_servico";
	protected $_primary = "id_ordem_servico";

	public function inserir($dados) {
		// Verificando se o id_cliente_origem existe
		if ($dados['id_cliente_origem'] > 0) {

		}



		// Setando valores
		$dados['valor_frete'] = Funcoes::formataValorBanco($dados['valor_frete']);
		$dados['valor_seguro'] = Funcoes::formataValorBanco($dados['valor_seguro']);
		$dados['valor_imposto'] = Funcoes::formataValorBanco($dados['valor_imposto']);
		// Formatando as datas
		$dados['data_execucao'] = $dados['data_execuacao'] == "" ? date('Y-m-d') : Funcoes::formataDataBanco($dados['data_execuacao']);
		return $this->insert($dados);
	}

	public function listar() {
		$db = $this->_db;
		$select = $db->select();
		$select ->from(array('tbos' => $this->_name), array('id_ordem_servico', 'data_execucao as emissao'))
				->joinLeft(array('tbc' => 'tb_cliente'), 'tbos.id_cliente = tbc.id_cliente', array('razao_social'))
				->group('id_ordem_servico')
				->order('id_ordem_servico DESC');
		return $db->fetchAll($select);

	}
}