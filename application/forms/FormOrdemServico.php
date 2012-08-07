<?php
class FormLogin extends Zend_Form {


	public function init() {
		parent::init();
		// E-mail
		$email = $this->createElement('text', 'email');
		$email	->setRequired(true)
				->setAttrib('class', 'login username-field')
				->setAttrib('id', 'email')
				->setAttrib('placeholder', 'E-mail')
				->addValidator('EmailAddress')
				->removeDecorator('HtmlTag')
				->removeDecorator('label');
		$this->addElement($email);

		// Senha
		$senha = $this->createElement('password', 'senha');
		$senha	->setRequired(true)
				->setAttrib('class', 'login password-field')
				->setAttrib('id', 'senha')
				->setAttrib('placeholder', 'Senha')
				->removeDecorator('HtmlTag')
				->removeDecorator('label');
		$this->addElement($senha);

	}
}