<?php

class ModeloFatura extends ModeloAbstrato {

	protected $_name = "tb_fatura";
	protected $_primary = "id_fatura";

	protected $_dependentTables = array('ModeloFaturaItem');

	protected $_referenceMap = array(
        array(
            'refTableClass' => 'ModeloCliente',
            'refColumns' => 'id_cliente',
            'columns' => 'id_cliente',
        )
    );

	public function inserir($dados) {
		// Setando valores
		$dados['valor_duplicata'] = Funcoes::formataValorBanco($dados['valor_duplicata']);
		$dados['valor_fatura'] = Funcoes::formataValorBanco($dados['valor_fatura']);
		$dados['desconto'] = Funcoes::formataValorBanco($dados['desconto']);
		// Formatando as datas
		$dados['data_vencimento'] = Funcoes::formataDataBanco($dados['data_vencimento']);
		$dados['data_pagamento'] = Funcoes::formataDataBanco($dados['data_pagamento']);
		$dados['data_cadastro'] = date('Y-m-d');
		return $this->insert($dados);
	}

	public function listarFaturas() {
		$db = $this->_db;
		$select = $db->select();
		$select ->from(array('tbf' => $this->_name), array('id_fatura', 'data_cadastro as emissao', 'data_vencimento', 'numero_fatura', 'valor_total'))
				->joinLeft(array('tbc' => 'tb_cliente'), 'tbf.id_cliente = tbc.id_cliente', array('razao_social'))
				->group('id_fatura')
				->order('id_fatura DESC');
		return $db->fetchAll($select);

	}
}