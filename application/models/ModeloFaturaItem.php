<?php

class ModeloFaturaItem extends ModeloAbstrato {

	protected $_name = "tb_fatura_item";
	protected $_primary = "id_fatura_item";

	protected $_referenceMap = array(
        array(
            'refTableClass' => 'ModeloFatura',
            'refColumns' => 'id_fatura',
            'columns' => 'id_fatura',
        )
    );

	public function inserir($dados) {
		// Inserir por demanda
		for ($i=0; $i < count($dados); $i++) {
			if ($dados['descricao_servico'][$i] != NULL) {
				$dadosItem = array();
				$dadosItem['id_fatura'] = $dados['id_fatura'];
				$dadosItem['descricao'] = $dados['descricao_servico'][$i];
				$dadosItem['data_execucao'] = Funcoes::formataDataBanco($dados['data_servico'][$i]);
				$dadosItem['nota_fiscal'] = $dados['nota_servico'][$i];
				$dadosItem['valor'] = Funcoes::formataValorBanco($dados['valor_servico'][$i]);
				$this->insert($dadosItem);
			}
		}
	}

	public function atualizaValorTotalFatura($id_fatura) {
		if ($id_fatura > 0) {
			$select = $this->select();
			$select ->from($this->_name, array('SUM(valor) as valor_total'))
					->where('id_fatura = ?', $id_fatura);
			$valor_total = $this->fetchRow($select)->valor_total;
			$modeloFatura = new ModeloFatura();
			$modeloFatura->update(array('valor_total' => $valor_total), 'id_fatura = '. $id_fatura);
		}
		return false;
	}
}