<?php
class UsuarioController extends BaseController {

	//
	private $formLogin;

	public function init() {
		parent::init();

		$this->formLogin = new FormLogin();

	}

	public function indexAction() {

	}
	public function loginAction() {

		if ($this->getRequest()->isPost()) {
			$dados = $this->getRequest()->getPost();
			if ($this->formLogin->isValid($dados)) {
				//Zend_Debug::dump($dados);exit;
				$db = Zend_Registry::get('db');
	            $authAdapter = new Zend_Auth_Adapter_DbTable($db);
	            $authAdapter->setTableName('tb_usuario')
	            			->setIdentityColumn('email')
	            			->setCredentialColumn('senha')
	            			->setCredentialTreatment('SHA1(?)');
	            //seta as credencias para a autenticação
	            $authAdapter->setIdentity($dados['email']);
	            $authAdapter->setCredential($dados['senha']);
	            //faço a autenticação
	            $auth = Zend_Auth::getInstance();
	            $result = $auth->authenticate($authAdapter);
	            if ($result->isValid()) {
	                //sucesso
	                $data = $authAdapter->getResultRowObject(null, 'senha');
	                $auth->getStorage()->write($data);
	                // Enviar para página inicial
	                $this->_redirect('/');
	            } else {
	                Zend_Auth::getInstance()->clearIdentity();
	            }
			} else {
				$this->formLogin->populate($dados);
			}
		}

		$this->view->form = $this->formLogin;
	}

	public function logoutAction() {
		Zend_Auth::getInstance()->clearIdentity();
		$this->_redirect('usuario/login');
	}
}