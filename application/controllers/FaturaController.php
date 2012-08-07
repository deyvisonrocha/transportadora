<?php

class FaturaController extends BaseController {

	/**
	 * Atributos
	 */
	private $formFatura;
    private $modeloCliente;
    private $modeloFatura;
    private $modeloFaturaItem;

    public function preDispatch() {
        parent::preDispatch();

        /*$ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('lista-itens', 'html')
                    ->addActionContext('inserirItem', 'json')
                    ->initContext();*/
    }

    public function init() {
        parent::init();
    	// Instanciando
    	$this->formFatura = new FormFatura();
        $this->modeloCliente = new ModeloCliente();
        $this->modeloFatura = new ModeloFatura();
        $this->modeloFaturaItem = new ModeloFaturaItem();
    }

    public function indexAction() {
    	// Lista
        $this->view->dados = $this->modeloFatura->listarFaturas();
    }

    public function formAction() {
    	// Form de Inserção
        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getPost();
            if ($this->formFatura->isValid($dados)) {
                // Cadastrar Cliente
                $id_cliente = $this->modeloCliente->inserir($dados['cliente']);
                // Verificando se foi inserido
                if ($id_cliente  > 0) {
                    $dados['fatura']['id_cliente'] = $id_cliente;
                    // Cadastrar Fatura
                    $id_fatura = $this->modeloFatura->inserir($dados['fatura']);
                    $dados['servicos']['id_fatura'] = $id_fatura;
                    //Cadastrar Itens da Fatura
                    $this->modeloFaturaItem->inserir($dados['servicos']);
                    // Obter valor Total Inserido nos Itens
                    $valor_total = $this->modeloFaturaItem->atualizaValorTotalFatura($id_fatura);
                    $this->_redirect('fatura');
                } else {
                    // tratar um erro
                }
            }
        }
    	$this->view->form = $this->formFatura;
    }

    public function excluirAction() {
        $id_fatura = $this->getRequest()->getParam('id');
        try {
            $this->modeloFatura->delete('id_fatura = '.$id_fatura);
            $this->_redirect('fatura');
        } catch (Exception $e) {
            print $e;
            exit;
        }
    }

    public function imprimirAction() {
        $this->_helper->layout->disableLayout();
        //$this->_helper->viewRenderer->setNoRender(TRUE);
        $id_fatura = $this->getRequest()->getParam('id');
        // Recuperando Info da Fatura, Cliente e Itens
        $fatura = $this->modeloFatura->find($id_fatura)->current();
        $cliente = $this->modeloCliente->find($fatura->id_cliente)->current();
        $itens = $this->modeloFaturaItem->fetchAll('id_fatura = '.$id_fatura);

        // enviar para view
        $this->view->fatura = $fatura;
        $this->view->cliente = $cliente;
        $this->view->itens = $itens;
        if ($this->getRequest()->getParam('duplicata') == "sim") {
            $this->view->duplicata = true;
        }
    }
}