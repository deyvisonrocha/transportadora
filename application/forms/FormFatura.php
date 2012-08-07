<?php
class FormFatura extends Zend_Form {


	public function init() {
		parent::init();
		// Valor da fatura
		$valor_fatura = $this->createElement('text', 'valor_fatura');
		$valor_fatura	->setRequired(false)
						->setBelongsTo('fatura')
						->setAttrib('class', 'span2 input-medium')
						->setAttrib('id', 'valor_fatura')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($valor_fatura);

		// Numero da Fatura
		$numero_fatura = $this->createElement('text', 'numero_fatura');
		$numero_fatura	->setRequired(false)
						->setBelongsTo('fatura')
						->setAttrib('class', 'span2 input-medium')
						->setAttrib('id', 'numero_fatura')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($numero_fatura);

		// Valor Duplicata
		$valor_duplicata = $this->createElement('text', 'valor_duplicata');
		$valor_duplicata->setRequired(false)
						->setBelongsTo('fatura')
						->setAttrib('class', 'span2 input-medium')
						->setAttrib('id', 'valor_duplicata')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($valor_duplicata);

		// Numero Duplicata
		$numero_duplicata = $this->createElement('text', 'numero_duplicata');
		$numero_duplicata	->setRequired(false)
							->setBelongsTo('fatura')
							->setAttrib('class', 'span2 input-medium')
							->setAttrib('id', 'numero_duplicata')
							->removeDecorator('HtmlTag')
							->removeDecorator('label');
		$this->addElement($numero_duplicata);

		// Data de Vencimento
		$data_vencimento = $this->createElement('text', 'data_vencimento');
		$data_vencimento->setRequired(false)
						->setBelongsTo('fatura')
						->setAttrib('class', 'span2 input-small')
						->setAttrib('size', 16)
						->setAttrib('id', 'data_vencimento')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($data_vencimento);

		// Desconto
		$desconto = $this->createElement('text', 'desconto');
		$desconto		->setRequired(false)
						->setBelongsTo('fatura')
						->setAttrib('class', 'span2 input-large')
						->setAttrib('size', 16)
						->setAttrib('id', 'desconto')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($desconto);

		// Data de Pagamento
		$data_pagamento = $this->createElement('text', 'data_pagamento');
		$data_pagamento	->setRequired(false)
						->setBelongsTo('fatura')
						->setAttrib('class', 'input-small')
						->setAttrib('size', 16)
						->setAttrib('id', 'data_pagamento')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($data_pagamento);

		// Condições Especiais
		$condicoes_especiais = $this->createElement('text', 'condicoes_especiais');
		$condicoes_especiais	->setRequired(false)
								->setBelongsTo('fatura')
								->setAttrib('class', 'input-xlarge')
								->setAttrib('size', 16)
								->setAttrib('id', 'condicoes_especiais')
								->removeDecorator('HtmlTag')
								->removeDecorator('label');
		$this->addElement($condicoes_especiais);

		// Dados do Sacado
		// Nome do Sacado
		$nome_sacado = $this->createElement('text', 'nome_sacado');
		$nome_sacado->setRequired(false)
					->setBelongsTo('cliente')
					->setAttrib('class', 'input-xlarge')
					->setAttrib('size', 16)
					->setAttrib('id', 'nome_sacado')
					->removeDecorator('HtmlTag')
					->removeDecorator('label');
		$this->addElement($nome_sacado);

		$endereco_sacado = $this->createElement('text', 'endereco_sacado');
		$endereco_sacado->setRequired(false)
						->setBelongsTo('cliente')
						->setAttrib('class', 'input-xlarge')
						->setAttrib('size', 16)
						->setAttrib('id', 'endereco_sacado')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($endereco_sacado);

		$municipio_sacado = $this->createElement('text', 'municipio_sacado');
		$municipio_sacado	->setRequired(false)
							->setBelongsTo('cliente')
							->setAttrib('class', 'input-medium')
							->setAttrib('size', 16)
							->setAttrib('id', 'municipio_sacado')
							->removeDecorator('HtmlTag')
							->removeDecorator('label');
		$this->addElement($municipio_sacado);


		$estado_sacado = $this->createElement('select', 'estado_sacado');
		$estado_sacado	->setRequired(false)
						->setBelongsTo('cliente')
						->setAttrib('class', 'input-medium')
						//->setAttrib('size', 16)
						->setAttrib('id', 'estado_sacado')
						->removeDecorator('HtmlTag')
						->removeDecorator('label')
						->setRegisterInArrayValidator(false);
		$ufs = new ModeloEstados();
		$opts = $ufs->retornarSiglaDescricao();
		$estado_sacado->setMultiOptions($opts);
		$this->addElement($estado_sacado);

		$cep_sacado = $this->createElement('text', 'cep_sacado');
		$cep_sacado	->setRequired(false)
					->setBelongsTo('cliente')
					->setAttrib('class', 'input-small')
					->setAttrib('size', 16)
					->setAttrib('id', 'cep_sacado')
					->removeDecorator('HtmlTag')
					->removeDecorator('label');
		$this->addElement($cep_sacado);


		$praca_pagamento_sacado = $this->createElement('text', 'praca_pagamento_sacado');
		$praca_pagamento_sacado	->setRequired(false)
								->setBelongsTo('cliente')
								->setAttrib('class', 'input-xlarge')
								->setAttrib('size', 16)
								->setAttrib('id', 'praca_pagamento_sacado')
								->removeDecorator('HtmlTag')
								->removeDecorator('label');
		$this->addElement($praca_pagamento_sacado);


		$cnpj_cpf_sacado = $this->createElement('text', 'cnpj_cpf_sacado');
		$cnpj_cpf_sacado->setRequired(false)
						->setBelongsTo('cliente')
						->setAttrib('class', 'input-large')
						->setAttrib('size', 16)
						->setAttrib('id', 'cnpj_cpf_sacado')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($cnpj_cpf_sacado);


		$inscricao_estadual_sacado = $this->createElement('text', 'inscricao_estadual_sacado');
		$inscricao_estadual_sacado	->setRequired(false)
									->setBelongsTo('cliente')
									->setAttrib('class', 'input-medium')
									->setAttrib('size', 16)
									->setAttrib('id', 'inscricao_estadual_sacado')
									->removeDecorator('HtmlTag')
									->removeDecorator('label');
		$this->addElement($inscricao_estadual_sacado);

		// Itens da Fatura
		/*// Descrição do Serviço
		$descricao_servico = $this->createElement('text', 'descricao_servico[]');
		$descricao_servico	->setRequired(false)
							->setIsArray(true)
							->setBelongsTo('servicos')
							->setAttrib('class', 'input-xxlarge')
							->setAttrib('size', 16)
							->setAttrib('id', 'descricao_servico_1')
							->removeDecorator('HtmlTag')
							->removeDecorator('label');
		$this->addElement($descricao_servico);

		$data_servico = $this->createElement('text', 'data_servico');
		$data_servico	->setRequired(false)
						->setIsArray(true)
						->setBelongsTo('servicos')
						->setAttrib('class', 'input-small')
						->setAttrib('size', 16)
						->setAttrib('id', 'data_servico')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($data_servico);

		$nota_servico = $this->createElement('text', 'nota_servico');
		$nota_servico	->setRequired(false)
						->setIsArray(true)
						->setBelongsTo('servicos')
						->setAttrib('class', 'input-small')
						->setAttrib('size', 16)
						->setAttrib('id', 'nota_servico')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($nota_servico);

		$valor_servico = $this->createElement('text', 'valor_servico');
		$valor_servico	->setRequired(false)
						->setIsArray(true)
						->setBelongsTo('servicos')
						->setAttrib('class', 'input-small')
						->setAttrib('size', 16)
						->setAttrib('id', 'valor_servico')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($valor_servico);*/

	}
}