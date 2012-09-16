<?php
class OrdemServicoController extends BaseController {

    /**
     * Atributos
     */
    private $modeloCliente;
    private $modeloOrdemServico;

	public function init() {
		parent::init();
        $this->modeloOrdemServico = new ModeloOrdemServico();
	}
    public function indexAction() {
        // Lista
        $this->view->dados = $this->modeloOrdemServico->listar();
    }

    public function formAction() {
        // Form
        $form = new FormOrdemServico();
        // Form de Inserção
        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getPost();
            if ($form->isValid($dados)) {
                try {
                    $this->modeloOrdemServico->inserir($dados);
                } catch (Exception $e) {
                    print $e->getMessage();
                }
            }
        }
        $this->view->form = $form;
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
            $json['value'] = $valor['cpf_cnpj']." | ".$valor['razao_social'] ." | ".$valor['nome_fantasia'];
        }
        print "[".json_encode($json)."]";
    }
}