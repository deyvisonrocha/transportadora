<?php
class FormCliente extends Zend_Form {


	public function init() {
		parent::init();

		// razao_social
		$razao_social = $this->createElement('text', 'razao_social');
		$razao_social	->setRequired(true)
						->setAttrib('id', 'razao_social')
						->setAttrib('placeholder', 'Nome Completo')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($razao_social);
		// nome_fantasia
		$nome_fantasia = $this->createElement('text', 'nome_fantasia');
		$nome_fantasia	->setRequired(false)
						->setAttrib('id', 'nome_fantasia')
						->setAttrib('placeholder', 'Nome Fantasia')
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($nome_fantasia);
		// tipo_cliente
		$tipo_cliente = $this->createElement('select', 'tipo_cliente');
		$tipo_cliente	->setRequired(true)
						->setAttrib('id', 'tipo_cliente')
						->addMultiOptions(array('PF' => "Pessoa Física", 'PJ' => "Pessoa Jurídica"))
						->removeDecorator('HtmlTag')
						->removeDecorator('label');
		$this->addElement($tipo_cliente);
		// cpf_cnpj
		$cpf_cnpj = $this->createElement('text', 'cpf_cnpj');
		$cpf_cnpj	->setRequired(true)
					->setAttrib('id', 'cpf_cnpj')
					->setAttrib('placeholder', 'CPF')
					->removeDecorator('HtmlTag')
					->removeDecorator('label');
		$this->addElement($cpf_cnpj);
		// endereco
		$endereco = $this->createElement('text', 'endereco');
		$endereco	->setRequired(true)
					->setAttrib('id', 'endereco')
					->setAttrib('placeholder', 'Endereço')
					->removeDecorator('HtmlTag')
					->removeDecorator('label');
		$this->addElement($endereco);
		// numero
		$numero = $this->createElement('text', 'numero');
		$numero	->setRequired(true)
				->setAttrib('id', 'numero')
				->setAttrib('placeholder', 'Número')
				->removeDecorator('HtmlTag')
				->removeDecorator('label');
		$this->addElement($numero);
		// complemento
		$complemento = $this->createElement('text', 'complemento');
		$complemento->setRequired(false)
					->setAttrib('id', 'complemento')
					->setAttrib('placeholder', 'Complemento')
					->removeDecorator('HtmlTag')
					->removeDecorator('label');
		$this->addElement($complemento);
		// bairro
		$bairro = $this->createElement('text', 'bairro');
		$bairro	->setRequired(true)
				->setAttrib('id', 'bairro')
				->setAttrib('placeholder', 'Bairro')
				->removeDecorator('HtmlTag')
				->removeDecorator('label');
		$this->addElement($bairro);
		// cidade
		$cidade = $this->createElement('text', 'cidade');
		$cidade	->setRequired(true)
				->setAttrib('id', 'cidade')
				->setAttrib('placeholder', 'Cidade')
				->removeDecorator('HtmlTag')
				->removeDecorator('label');
		$this->addElement($cidade);
		// uf
		$uf = $this->createElement('select', 'uf');
		$uf	->setRequired(false)
			->setAttrib('id', 'uf')
			->setAttrib('class', 'input-large')
			->removeDecorator('HtmlTag')
			->removeDecorator('label')
			->setRegisterInArrayValidator(false);
		$ufs = new ModeloEstados();
		$opts = $ufs->retornarSiglaDescricao();
		$uf ->setMultiOptions($opts);
		$this->addElement($uf);
		
		// cep
		$cep = $this->createElement('text', 'cep');
		$cep->setRequired(true)
			->setAttrib('id', 'cep')
			->setAttrib('placeholder', 'CEP')
			->removeDecorator('HtmlTag')
			->removeDecorator('label');
		$this->addElement($cep);
		// contato
		$contato = $this->createElement('text', 'contato');
		$contato->setRequired(false)
				->setAttrib('id', 'contato')
				->setAttrib('placeholder', 'Contato')
				->removeDecorator('HtmlTag')
				->removeDecorator('label');
		$this->addElement($contato);
		// sexo
		$sexo = $this->createElement('select', 'sexo');
		$sexo	->setRequired(false)
				->setAttrib('id', 'sexo')
				->addMultiOptions(array('M' => "Masculino", 'F' => "Feminino"))
				->removeDecorator('HtmlTag')
				->removeDecorator('label');
		$this->addElement($sexo);
		// email
		$email = $this->createElement('text', 'email');
		$email	->setRequired(true)
				->setAttrib('class', 'login username-field')
				->setAttrib('id', 'email')
				->setAttrib('placeholder', 'E-mail')
				->addValidator('EmailAddress')
				->removeDecorator('HtmlTag')
				->removeDecorator('label');
		$this->addElement($email);
		// site
		$site = $this->createElement('text', 'site');
		$site	->setRequired(false)
				->setAttrib('id', 'site')
				->setAttrib('placeholder', 'Site')
				->removeDecorator('HtmlTag')
				->removeDecorator('label');
		$this->addElement($site);
		// inscricao_estadual
		$inscricao_estadual = $this->createElement('text', 'inscricao_estadual');
		$inscricao_estadual	->setRequired(false)
							->setAttrib('id', 'inscricao_estadual')
							->setAttrib('placeholder', 'Inscrição Estadual')
							->removeDecorator('HtmlTag')
							->removeDecorator('label');
		$this->addElement($inscricao_estadual);
		// inscricao_municipal
		$inscricao_municipal = $this->createElement('text', 'inscricao_municipal');
		$inscricao_municipal->setRequired(false)
							->setAttrib('id', 'inscricao_municipal')
							->setAttrib('placeholder', 'Inscrição Municipal')
							->removeDecorator('HtmlTag')
							->removeDecorator('label');
		$this->addElement($inscricao_municipal);
		// ativo
		$ativo = $this->createElement('select', 'ativo');
		$ativo	->setRequired(true)
				->setAttrib('id', 'ativo')
				->addMultiOptions(array('S' => "SIM", 'N' => "NÃO"))
				->removeDecorator('HtmlTag')
				->removeDecorator('label');
		$this->addElement($ativo);
		// telefone1
		$telefone1 = $this->createElement('text', 'telefone1');
		$telefone1	->setRequired(false)
					->setAttrib('id', 'telefone1')
					->setAttrib('placeholder', 'Telefone')
					->removeDecorator('HtmlTag')
					->removeDecorator('label');
		$this->addElement($telefone1);
		// telefone2
		$telefone2 = $this->createElement('text', 'telefone2');
		$telefone2	->setRequired(false)
					->setAttrib('id', 'telefone2')
					->setAttrib('placeholder', 'Celular')
					->removeDecorator('HtmlTag')
					->removeDecorator('label');
		$this->addElement($telefone2);
	}
}