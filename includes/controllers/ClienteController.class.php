<?php

class ClienteController extends _BaseController
{	
	public function __construct($action=null, $data=null) {
		parent::__construct($action,$data);
	}
	
	public function index(){
		$dao = new ClienteDAO();
		$clientes = $dao->getList();
		$scripts = $this->getScriptDatatable();
		$content = 'includes/views/cliente/index.php';
		include $this->layout;
	}
	
	public function save(){
		$dao = new ClienteDAO();
		$cliente = new Cliente();
		if($this->id){
			$cliente = $dao->getCliente($this->id);
			if($cliente->getId()==null){
				$cliente = null;
				$this->msg = array('Cliente não foi encontrado','warning');
			}
		}
		if($_POST){
			// Aqui deve-se colocar a validação dos dados de entrada
			$data = (object) $_POST;
			$cliente->setNome($data->nome);
			$cliente->setEmail($data->email);
			$cliente->setTelefone($data->telefone);
			$id = $dao->save($cliente);
			if($id!=null){
				$cliente->setId($id);
			}
			$this->msg = $dao->mensagem;
		}
	
		$content = 'includes/views/cliente/save.php';
		include $this->layout;
	}
	
	public function excluir(){
		$dao = new ClienteDAO();
		$cliente = new Cliente();
		if($this->id){
			$cliente = $dao->getCliente($this->id);
			if($cliente->getId()!=null){
				$dao->excluir($this->id);
				$this->msg = $dao->mensagem;
			}else{
				$this->msg = array('Cliente não foi encontrado','warning');
			}
		}
		$content = 'includes/views/cliente/delete.php';
		include $this->layout;
	}
}