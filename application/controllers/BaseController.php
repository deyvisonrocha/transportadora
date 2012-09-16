<?php
class BaseController extends Zend_Controller_Action {

	public function init() {
		parent::init();
		$front = Zend_Controller_Front::getInstance()->getRequest();
		$controller = $front->getControllerName();
		$action = $front->getActionName();
		if ($controller != 'usuario' && $action != 'login' && !$this->verificaSeEstaLogado()) {
			$this->_redirect('usuario/login');
		}
	}

	public function getBaseUrl() {
		return Zend_Controller_Front::getInstance()->getBaseUrl();
	}

	public function getPathSite() {
		$config = Zend_Registry::get('config');
		return $config->app->config->pathUrl;
	}

	public function verificaSeEstaLogado() {
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			return false;
		}
		return true;
	}

	public function buscarCliente($query) {
		$cliente = new ModeloCliente();
		return $cliente->buscar($query);
	}

}