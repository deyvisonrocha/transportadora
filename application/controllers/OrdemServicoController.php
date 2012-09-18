<?php
class OrdemServicoController extends BaseController {

    /**
     * Atributos
     */
    private $form;
    private $modeloCliente;
    private $modeloOrdemServico;

	public function init() {
		parent::init();
        $this->modeloOrdemServico = new ModeloOrdemServico();
        $this->form = new FormOrdemServico();
	}
    public function indexAction() {
        // Lista
        $this->view->dados = $this->modeloOrdemServico->listar();
    }

    public function formAction() {
        $form = $this->form;
        $form->setAction($this->getBaseUrl()."/".$this->getRequest()->getControllerName()."/".$this->getRequest()->getActionName());
        // Form de Inserção
        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getPost();
            if ($form->isValid($dados)) {
                if ($dados['id_ordem_servico'] != "") {
                    // Editar
                    $this->modeloOrdemServico->alterar($dados);
                } else {
                    // Cadastrar
                    $this->modeloOrdemServico->inserir($dados);
                }
                $this->_redirect($this->getRequest()->getControllerName());
            } else {
                $form->populate($dados);
            }
        } else {
            $id = $this->getRequest()->getParam('id');
            if ($id > "0") {
                $ordem_servico = $this->modeloOrdemServico->fetchRow('id_ordem_servico ='.$id)->toArray();
                $form->populate($ordem_servico);
            }
        }
        $this->view->form = $form;
    }

    public function imprimirAction() {
        $this->_helper->layout->disableLayout();
        $id = $this->getRequest()->getParam('id');
        $ordem = $this->modeloOrdemServico->getById($id);
        settype($ordem, 'object');
        $this->view->ordem_servico = $ordem;
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
            $json['label'] = $valor['cpf_cnpj']." | ".$valor['razao_social'] ." | ".$valor['nome_fantasia'];
            $json['value'] = $valor['cpf_cnpj'];
        }
        print "[".json_encode($json)."]";
    }
}