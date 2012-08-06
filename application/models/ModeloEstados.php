<?php

class ModeloEstados extends ModeloAbstrato {

	protected $_name = "tb_uf";
	protected $_primary = "id_uf";

	public function retornarSiglaDescricao() {
		$select = $this->select();
		$select	->from($this->_name, array('sigla', 'descricao'))
				->order('sigla ASC');
		$retorno = $this->fetchAll($select);
		$arrayObj = array();
		foreach ($retorno as $v) {
			$arrayObj[$v['sigla']] = $v['descricao'];
		}
		return $arrayObj;
	}

}