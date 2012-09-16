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

    /**
     * Método para Retornar o cliente pelo CPF digitado.
     */
    public function buscarClienteAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        // campo
        $cpf_cnpj = $this->_getParam('term');
        $retorno = parent::buscarCliente($cpf_cnpj);
        $json = array();
        foreach ($retorno as $valor) {
            $json['id_cliente'] = $valor['id_cliente'];
            $json['razao_social'] = $valor['razao_social'];
            $json['nome_fantasia'] = $valor['nome_fantasia'];
            $json['endereco'] = $valor['endereco'];
            $json['numero'] = $valor['numero'];
            $json['complemento'] = $valor['complemento'];
            $json['bairro'] = $valor['bairro'];
            $json['cidade'] = $valor['cidade'];
            $json['uf'] = $valor['uf'];
            $json['cep'] = $valor['cep'];
            $json['contato'] = $valor['contato'];
            $json['cpf_cnpj'] = $valor['cpf_cnpj'];
            $json['value'] = $valor['cpf_cnpj']."|".$valor['razao_social'] ." | ".$valor['nome_fantasia'];
        }
        print "[".json_encode($json)."]";
    }
}