<?php

class ClienteController extends BaseController {
	
	private $modeloCliente;

	public function init() {
		parent::init();

		//modelo
		$this->modeloCliente = new ModeloCliente();

	}

	public function indexAction() {
		$this->view->dados = $this->modeloCliente->fetchAll();
	}

	public function formAction() {
		$form = new FormCliente();

		if ($this->getRequest()->isPost()) {
			$dados = $this->getRequest()->getPost();
			if ($form->isValid($dados)) {
				if ($dados['id_cliente'] > '0') {
					// Alterar
					try {
						$this->modeloCliente->alterar($dados);
						$this->_redirect($this->getRequest()->getControllerName());
					} catch (Exception $e) {
						print $e->getMessage();
						exit;
					}					
				} else {
					// Cadastrar
					try {
						// Data de Cadastro
						$dados['data_cadastro'] = date('Y-m-d');
						$this->modeloCliente->insert($dados);
						$this->_redirect($this->getRequest()->getControllerName());
					} catch (Exception $e) {
						print $e->getMessage();
						exit;
					}
				}
			}
		} else {
			$id = $this->getRequest()->getParam('id');
			if (isset($id) && $id > 0) {
				$dados = $this->modeloCliente->fetchRow('id_cliente ='.$id)->toArray();
				$form->populate($dados);
				$this->view->id_cliente = $id;
			}
		}
		$this->view->form = $form;
	}

	public function excluirAction() {
        $id = $this->getRequest()->getParam('id');
        try {
            $this->modeloCliente->delete('id_cliente = '.$id);
            $this->_redirect($this->getRequest()->getControllerName());
        } catch (Exception $e) {
            print $e;
            exit;
        }
    }
}